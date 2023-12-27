<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;
use Auth;
use App\Order;
use Razorpay\Api\Api;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
        //return view('welcome');
        // $text_limit = env('REGISTER_USER_TEXT_LIMIT',10000);
        // $file_upload_size = env('REGISTER_USER_FILE_SIZE',5000000);
        // return view('welcome', ['text_char_limit' => $text_limit, 'file_upload_size' => $file_upload_size, 'user_signed_in'=>true]);
    }



    public function handleAdmin()
    {
        $users = DB::table('users')->orderBy('id','DESC')->get();

        $api_stats = DB::table('api_stats')
                    ->select(DB::raw('api_name, count(*) as count'))
                    ->groupBy('api_name')
                    ->get();

        return view('admin.layouts.app', ["users"=>$users, "api_stats"=>$api_stats]);
    }

    public function subscribe(){

        $result = Order::with('orderdetails')->get();

        $subscribers =  DB::table('orders')->distinct('auth_id')->count();
        $active =  Order::where('buy_account_status','inprogress')->count();
        $inactive =  Order::where('buy_account_status','completed')->count();
        $cancelled =  Order::where('buy_account_status','cancelled')->count();


        $cost =  Order::all();
        $value = array();
        foreach($cost as $costs){
            $value[] = @$costs['cost'];
        }

        @$value = array_sum(@$value);

        return view('admin.layouts.subscribedetails',compact('result','subscribers','value','active','inactive','cancelled'));
    }


    public function filterrecord(Request $request){

        // $from = date('Y-m-d H:i:s',strtotime($request->fromdate));
        // $to = date('Y-m-d H:i:s',strtotime($request->todate));

        $from = date("Y-m-d H:i:s",strtotime(@$request->input('fromdate')));
        $to = date("Y-m-d H:i:s",strtotime(@$request->input('todate')."+1 day"));

        $result = Order::with('orderdetails')->whereBetween('created_at',[$from,$to])->get();

        if(count(@$result) > 0){
        foreach($result as $results){
         ?>
         <tr>
             <td><?php echo @$results->orderdetails->name ?></td>
            <td><?php echo @$results->orderdetails->email ?></td>
            <td><?php echo @$results->trial_account_date ?></td>
            <td><?php echo @$results->buy_account_date ?></td>
            <td><?php echo @$results->trial_account_status ?></td>
            <td><?php echo @$results->buy_account_status ?></td>
        </tr>

        <?php
        }
    }else{
        ?>
     <tr><td style="text-align: center;" colspan="6">No Records Found</td></tr>
        <?php
    }


    }


    public function payment_check(Request $request){

    $auth = Auth::id();
    $input = $request->all();
    $api = new Api('rzp_test_KrTaPREUKeeYSr', 'aIL6l3TXJYYLjffkdgaqF853');
    $payment = $api->payment->fetch($input['razorpay_payment_id']);
    // dd($payment);
     if(count($input)  && !empty($input['razorpay_payment_id'])) {
        try {
            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
            session(['buynotificationmessage' => 'Thanks for your subscription ...!']);

        } catch (\Exception $e) {
            return  $e->getMessage();
             return redirect('/');
        }
    }


       $checking_trail = Order::where('auth_id',Auth::id())->get();
       $trail_status[] = "";
       foreach($checking_trail as $checking_trails){
            if(!empty($checking_trails['trial_account_date'])){
                $trail_status[] = 'no';
            }
       }


       if(in_array("no",$trail_status)){
            $trails = NULL;
            $trial_account_status = NULL;
            $trial_account_days = NULL;
       }else{
            $trails = date('Y-m-d H:i:s');
            $buy_account_date = date('Y-m-d H:i:s', strtotime($trails. ' + 0 days'));
            $trial_account_status = "completed";
            $buy_account_status = "inprogress";
            $trial_account_days = "0";
            $buy_account_days = "30";
        }

        if(empty($trails)){
            $buy_account_date = date('Y-m-d H:i:s');
            $buy_account_status = "inprogress";
            $buy_account_days = "30";
        }

        Order::create([
            'auth_id' => Auth::id(),
            'order_id' => rand(111111,999999),
            'trial_account_date' => $trails,
            'trial_account_days' => $trial_account_days,
            'buy_account_date' => $buy_account_date,
            'buy_account_days' => $buy_account_days,
            'trial_account_status' => $trial_account_status,
            'buy_account_status' => $buy_account_status
         ]);



        // Order::create([
        //     'auth_id' => Auth::id(),
        //     'order_id' => rand(111111,999999),
        //     'trial_account_date' => $trails,
        //     'trial_account_days' => $trial_account_days,
        //     'buy_account_date' => $buy_account_date,
        //     'buy_account_days' => $buy_account_days,
        //     'trial_account_status' => $trial_account_status,
        //     'buy_account_status' => $buy_account_status
        //  ]);


        return redirect('/account');




    }

    public function exportUsers()
    {
        $users = DB::table('users')
                    ->select(DB::raw('id, name, email, provider, created_at'))
                    ->orderByRaw('id DESC')
                    ->get();

        $fileName = 'users.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('user_id', 'name', 'email', 'provider', 'created_at');

        $callback = function() use($users, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                $row['user_id']  = $user->id;
                $row['name']    = $user->name;
                $row['email']    = $user->email;
                $row['provider']  = $user->provider;
                $row['created_at']  = $user->created_at;

                fputcsv($file, array($row['user_id'], $row['name'], $row['email'], $row['provider'], $row['created_at']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
