<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Order;
use Auth;
use Session;
class PayPalKeypointsController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment_keypoints()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'Intellippt',
                'price' => 3,
                'desc'  => 'Intellipt premium pack',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 3;
        $data['currency'] = "USD";


        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data, true);

        return redirect('/account_keypoints');
	//return redirect($response['paypal_link']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel_keypoints(Request $request)
    {
        return view('cancel_keypoints');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success_keypoints(Request $request)
    {


        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        $responses = $provider->getTransactionDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
              dd('Your payment was successfully. You can create success page here.');
        }

        dd('Something is wrong.');
    }

    public function handle_keypoints_basic(){
         return view('handleAdminKeypointsBasic');
    }
    public function handle_keypoints_pro(){
         return view('handleAdminKeypointsPro');
    }
    public function handle_keypoints_premium(){
         return view('handleAdminKeypointsPremium');
    }

    public function paypalAccessToken()
    {

        $ch = curl_init();
        //Live

        if(env('PAYPAL_MODE') == "live"){

        $tokenUrl =  "https://www.paypal.com/v1/oauth2/token";

        $tokenSecret = env('PAYPAL_LIVE_CLIENT_ID').':'.env('PAYPAL_LIVE_SECRET_ID');

        // Live    
        //$tokenSecret = "AS0uq7oE0VYp_BAWX519W9ZVUD7GP51ma55Yo71CGLxoJNUmpw2EYVtbRZh-GnMQlo9xSGYlKLXdVp_o:EG1OZbA909Pse468-jOBVz95IinbjhQ5UH1jf1x-CPY_dznf8_XD3dncR2b20zRnRsFdRW3GY-tpL_uo";
        }else{

        //Sandbox
        $tokenUrl =  "https://www.sandbox.paypal.com/v1/oauth2/token";

        //$tokenSecret = env('PAYPAL_SANDBOX_CLIENT_ID').':'.env('PAYPAL_SANDBOX_SECRET_ID');
        
        // Sandbox
            $tokenSecret = "ActqxkWwPyL1Q03p0WLNwabuvu2XxGq7CZcRijp6EdzztxHBANkGpiKVMv8W3wG3f7lWZjC_oRyACXGC:ELeP6mNdZ1KxovsEAerpSYBBOjB_xZCPTiDUApdDXJ6_fMitokD_IVhWWGcwSOwX9NcYZKg31n_6eJWQ";

        }



        curl_setopt($ch, CURLOPT_URL, $tokenUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Accept-Language: en_US'
        ));
        curl_setopt($ch, CURLOPT_USERPWD, $tokenSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $json = json_decode($output);
        return $json;

    }


    public function notify_keypoints(Request $request){
        if($_POST['payment_status'] == "Completed"){
        $authid = @$_POST['custom'];
        session(['buynotificationmessage' => 'Thanks for your subscription ...!']);
        $checking_trail = Order::where(['auth_id'=>$authid,'keypoints'=>1])->get();
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
        $pdf_pages = 0;
        if($_POST['mc_gross']==10){$pdf_pages=1000;}elseif($_POST['mc_gross']==6){$pdf_pages=500;}elseif($_POST['mc_gross']==4){$pdf_pages=100;}
        Order::create([
            'auth_id' => $authid,
            'order_id' => rand(111111,999999),
            'trial_account_date' => $trails,
            'trial_account_days' => $trial_account_days,
            'buy_account_date' => $buy_account_date,
            'buy_account_days' => $buy_account_days,
            'trial_account_status' => $trial_account_status,
            'buy_account_status' => $buy_account_status,
	    'pdf_pages'=>0,
	    'max_pdf_pages'=>$pdf_pages,
	    'summarizer'=>0,
            'keypoints'=>1,
            'cost'=>$_POST['mc_gross'],
            'transaction_id' => @$_POST['txn_id']
        ]);

        }
 
     }



    public function paypalrefund_keypoints(Request $request,$id)
    {

        $json = $this->paypalAccessToken();

        $refNumber = $id;
        $refundType = 'partialRefund';
        $partialRefundObj = array('description'=>'Service Refund.','reason'=>'Service Cancellation','total'=>'0.5');
        //$partialRefundObj = array();
        $currency = "USD";

        if ($json->access_token) {
            $token = $json->access_token;
        } else {
            $token = NULL;
        }

        $PostData = '{}';

        if ($refundType != 'fullRefund') { // Partial Refund
            $desc = isset($partialRefundObj['description']) ? $partialRefundObj['description'] : '';
            $reason = isset($partialRefundObj['reason']) ? $partialRefundObj['reason'] : '';

            $PostData = '{
                "amount": {
                    "total": "' . $partialRefundObj['total'] . '",
                    "currency": "'.$currency.'"
                  },
                  "description" : "' . $desc . '",
                  "reason" : "' . $reason . '"
            }';
        }

        if ($token) {

            $header = array(
                "Content-Type: application/json",
                "Authorization: Bearer $token",
            );

            if(env('PAYPAL_MODE') == "live"){
            
            //Live URL
            $refundUrl =  "https://www.paypal.com/v1/payments/sale/$refNumber/refund";

            }else{
            //Sandbox
            $refundUrl =  "https://www.sandbox.paypal.com/v1/payments/sale/$refNumber/refund";
            
            }
            $ch = curl_init($refundUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $PostData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $res = json_decode(curl_exec($ch));
            // dd($res);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            // return $res;

            if(@$res->state == "completed"){

                $order_updates = Order::where('transaction_id', $id)->first();
                $order_update = Order::find($order_updates->id);
                $order_update->buy_account_status = "cancelled";
                $order_update->buy_finish_date = date('Y-m-d');
                $order_update->save();

                return redirect('/account_keypoints')->with('buynotificationmessage', 'Your premium pack cancellation has been initiated...!');
            }else{
                return redirect('/account_keypoints')->with('buynotificationmessage', @$res->message);
            }

        }else{

            return redirect('/account_keypoints');

        }

    }




}
