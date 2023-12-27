<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Order;
use App\aiuse;

/* Use Session; */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    if (Auth::check()) {
        // echo Auth::id();
        // die(Auth::id());
        // $numofai = aiuse::where('user_id',Auth::id())->first();
        $numofai = aiuse::where('user_id', Auth::id())->count();
        if ($numofai == 0) {
            $inputs = ['user_id' => Auth::id(), 'numberofuses' => '0'];
            aiuse::create($inputs);

        }
        $numofai = aiuse::where('user_id', Auth::id())->first()->numberofuses;

        // echo "ss";
        // print_r($numofai) ;
        // die();

        $validate = "";

        $orders = Order::where('auth_id', Auth::id())->orderBy('created_at', 'DESC')->first();

        if (@$orders->trial_account_status == "inprogress") {

            $validate = "yes";

            $trail_start_date = date('Y-m-d', strtotime($orders->trial_account_date));
            $trail_end_date = date('Y-m-d');
            // $trail_end_date = "2021-06-23";
            $date1 = date_create($trail_start_date);
            $date2 = date_create($trail_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");


            if ($betweendate <= $orders->trial_account_days) { //30days checking
                $validate = "yes";

                $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);

                $user_signed_in = true;

            } else {

                $validate = "yes";

                $order_update = Order::find($orders->id);
                $order_update->trial_account_status = "completed";
                $order_update->trail_finish_date = date('Y-m-d');
                $order_update->save();

                $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
                $buy_end_date = date('Y-m-d');
                // $buy_end_date = "2021-05-22";
                $date1 = date_create($buy_start_date);
                $date2 = date_create($buy_end_date);
                $diff = date_diff($date1, $date2);
                $betweendate = $diff->format("%a");

                if ($betweendate <= $orders->buy_account_date) { //30days checking

                    // $text_limit = env('REGISTER_USER_TEXT_LIMIT',10000);
                    $text_limit = 50000;

                    $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                    $user_signed_in = true;

                } else {
                    $validate = "yes";
                    $order_update = Order::find($orders->id);
                    $order_update->buy_account_status = "completed";
                    $order_update->buy_finish_date = date('Y-m-d');
                    $order_update->save();

                    // $text_limit = env('UNREGISTER_USER_TEXT_LIMIT',3000);
                    $text_limit = 50000;

                    $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                    $user_signed_in = false;
                }

            }

        } else if (@$orders->buy_account_status == "inprogress") {



            $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
            $buy_end_date = date('Y-m-d');
            // $buy_end_date = "2021-06-23";
            $date1 = date_create($buy_start_date);
            $date2 = date_create($buy_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");

            if ($betweendate <= $orders->buy_account_days) { //30days checking

                $validate = "yes";

                // $text_limit = env('REGISTER_USER_TEXT_LIMIT',10000);
                $text_limit = 50000;
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                $user_signed_in = true;

            } else {

                $validate = "no";

                $order_update = Order::find($orders->id);
                $order_update->buy_account_status = "completed";
                $order_update->buy_finish_date = date('Y-m-d');
                $order_update->save();

                $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
                $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                $user_signed_in = false;
            }

        } else {

            $validate = "no";

            $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
            $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
            $user_signed_in = false;
        }

    } else {
        $numofai = 1000;
        $validate = "no";
        // $text_limit = env('UNREGISTER_USER_TEXT_LIMIT',3000);
        $text_limit = 3000;
        $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
        $user_signed_in = false;
    }

    return view('welcome', ['text_char_limit' => $text_limit, 'file_upload_size' => $file_upload_size, 'user_signed_in' => $user_signed_in, 'buy_validate' => $validate, 'numofai' => $numofai]);
    //return view('welcome');
});

//New page created n 16-11-2022
Route::get('/abs_summary', function () {
    if (Auth::check()) {
        // echo Auth::id();
        // die(Auth::id());
        // $numofai = aiuse::where('user_id',Auth::id())->first();
        $numofai = aiuse::where('user_id', Auth::id())->count();
        if ($numofai == 0) {
            $inputs = ['user_id' => Auth::id(), 'numberofuses' => '0'];
            aiuse::create($inputs);

        }
        $numofai = aiuse::where('user_id', Auth::id())->first()->numberofuses;

        // echo "ss";
        // print_r($numofai) ;
        // die();

        $validate = "";

        $orders = Order::where('auth_id', Auth::id())->orderBy('created_at', 'DESC')->first();

        if (@$orders->trial_account_status == "inprogress") {

            $validate = "yes";

            $trail_start_date = date('Y-m-d', strtotime($orders->trial_account_date));
            $trail_end_date = date('Y-m-d');
            // $trail_end_date = "2021-06-23";
            $date1 = date_create($trail_start_date);
            $date2 = date_create($trail_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");


            if ($betweendate <= $orders->trial_account_days) { //30days checking
                $validate = "yes";

                $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);

                $user_signed_in = true;

            } else {

                $validate = "yes";

                $order_update = Order::find($orders->id);
                $order_update->trial_account_status = "completed";
                $order_update->trail_finish_date = date('Y-m-d');
                $order_update->save();

                $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
                $buy_end_date = date('Y-m-d');
                // $buy_end_date = "2021-05-22";
                $date1 = date_create($buy_start_date);
                $date2 = date_create($buy_end_date);
                $diff = date_diff($date1, $date2);
                $betweendate = $diff->format("%a");

                if ($betweendate <= $orders->buy_account_date) { //30days checking

                    // $text_limit = env('REGISTER_USER_TEXT_LIMIT',10000);
                    $text_limit = 50000;

                    $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                    $user_signed_in = true;

                } else {
                    $validate = "yes";
                    $order_update = Order::find($orders->id);
                    $order_update->buy_account_status = "completed";
                    $order_update->buy_finish_date = date('Y-m-d');
                    $order_update->save();

                    // $text_limit = env('UNREGISTER_USER_TEXT_LIMIT',3000);
                    $text_limit = 50000;

                    $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                    $user_signed_in = false;
                }

            }

        } else if (@$orders->buy_account_status == "inprogress") {



            $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
            $buy_end_date = date('Y-m-d');
            // $buy_end_date = "2021-06-23";
            $date1 = date_create($buy_start_date);
            $date2 = date_create($buy_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");

            if ($betweendate <= $orders->buy_account_days) { //30days checking

                $validate = "yes";

                // $text_limit = env('REGISTER_USER_TEXT_LIMIT',10000);
                $text_limit = 50000;
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                $user_signed_in = true;

            } else {

                $validate = "no";

                $order_update = Order::find($orders->id);
                $order_update->buy_account_status = "completed";
                $order_update->buy_finish_date = date('Y-m-d');
                $order_update->save();

                $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
                $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                $user_signed_in = false;
            }

        } else {

            $validate = "no";

            $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
            $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
            $user_signed_in = false;
        }

    } else {
        $numofai = 1000;
        $validate = "no";
        // $text_limit = env('UNREGISTER_USER_TEXT_LIMIT',3000);
        $text_limit = 3000;
        $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
        $user_signed_in = false;
    }

    return view('newpage', ['text_char_limit' => $text_limit, 'file_upload_size' => $file_upload_size, 'user_signed_in' => $user_signed_in, 'buy_validate' => $validate, 'numofai' => $numofai]);
    //return view('welcome');
});

Route::get('/socialregister', 'SocialController@socialregister');
Route::post('/socialregisterpost', 'SocialController@socialregisterpost');
Route::get('subscribe', 'HomeController@subscribe');
Route::post('filterrecord', 'HomeController@filterrecord');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});

Route::get('/qq', function () {
    return env("APP_DEBUG");
    return "ss";
});


//For Intellippt
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
Route::get('handle', 'PayPalController@handle')->name('handle');
Route::get('paypalrefund/{id}', 'PayPalController@paypalrefund')->name('paypalrefund');
Route::post('/payment_check', 'HomeController@payment_check')->name('payment_check');
Route::post('notify', 'PayPalController@notify');

//For KeypointsDev
Route::get('payment_keypoints', 'PayPalKeypointsController@payment_keypoints')->name('payment_keypoints');
Route::get('cancel_keypoints', 'PayPalKeypointsController@cancel_keypoints')->name('payment.cancel_keypoints');
Route::get('payment/success_keypoints', 'PayPalKeypointsController@success_keypoints')->name('payment.success_keypoints');
Route::get('handle_keypoints_basic', 'PayPalKeypointsController@handle_keypoints_basic')->name('handle_keypoints_basic');
Route::get('handle_keypoints_pro', 'PayPalKeypointsController@handle_keypoints_pro')->name('handle_keypoints_pro');
Route::get('handle_keypoints_premium', 'PayPalKeypointsController@handle_keypoints_premium')->name('handle_keypoints_premium');
Route::get('paypalrefund_keypoints/{id}', 'PayPalKeypointsController@paypalrefund_keypoints')->name('paypalrefund_keypoints');
Route::post('/payment_check_keypoints', 'HomeController@payment_check_keypoints')->name('payment_check_keypoints');
Route::post('notify_keypoints', 'PayPalKeypointsController@notify_keypoints')->name('notify_keypoints');

//Add Keyoints Login Routes.
//Route::get('/keypoints_login', 'KeypointsLoginController@show_keypoints_login');
// Route::post('check_keypoints_login', 'KeypointsLoginController@checkKeypointsLogin')->name('check_keypoints_login');
// Route::get('keypoints_logout', 'KeypointsLoginController@keypointsLogout')->name('keypoints_logout');

Auth::routes(['verify' => true]);
Route::get('/account', function () {

    if (Auth::check()) {

        $validate = "";

        $orders = Order::where('auth_id', Auth::id())->orderBy('created_at', 'DESC')->first();

        if (@$orders->trial_account_status == "inprogress") {

            $validate = "yes";

            $trail_start_date = date('Y-m-d', strtotime($orders->trial_account_date));
            $trail_end_date = date('Y-m-d');
            // $trail_end_date = "2021-06-23";
            $date1 = date_create($trail_start_date);
            $date2 = date_create($trail_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");

            if ($betweendate <= $orders->trial_account_days) { //30days checking
                $validate = "yes";

                $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                $user_signed_in = true;

            } else {

                $validate = "yes";

                $order_update = Order::find($orders->id);
                $order_update->trial_account_status = "completed";
                $order_update->trail_finish_date = date('Y-m-d');
                $order_update->save();

                $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
                $buy_end_date = date('Y-m-d');
                // $buy_end_date = "2021-05-22";
                $date1 = date_create($buy_start_date);
                $date2 = date_create($buy_end_date);
                $diff = date_diff($date1, $date2);
                $betweendate = $diff->format("%a");

                if ($betweendate <= $orders->buy_account_date) { //30days checking

                    $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                    $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                    $user_signed_in = true;

                } else {
                    $validate = "yes";
                    $order_update = Order::find($orders->id);
                    $order_update->buy_account_status = "completed";
                    $order_update->buy_finish_date = date('Y-m-d');
                    $order_update->save();

                    $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
                    $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                    $user_signed_in = false;
                }

            }

        } else if (@$orders->buy_account_status == "inprogress") {



            $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
            $buy_end_date = date('Y-m-d');
            // $buy_end_date = "2021-06-23";
            $date1 = date_create($buy_start_date);
            $date2 = date_create($buy_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");

            if ($betweendate <= $orders->buy_account_days) { //30days checking

                $validate = "yes";

                $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                $user_signed_in = true;

            } else {

                $validate = "no";

                $order_update = Order::find($orders->id);
                $order_update->buy_account_status = "completed";
                $order_update->buy_finish_date = date('Y-m-d');
                $order_update->save();

                $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
                $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                $user_signed_in = false;
            }

        } else {

            $validate = "no";

            $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
            $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
            $user_signed_in = false;
        }

    } else {

        $validate = "no";
        $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
        $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
        $user_signed_in = false;
    }


    $orders = Order::where('auth_id', Auth::id())->orderBy('id', 'DESC')->first();
    // dd($orders->toArray());
    $orderscount = Order::where('auth_id', Auth::id())->count();
    $trails = Order::where('auth_id', Auth::id())->orderBy('trial_account_date', 'DESC')->first();

    if (!empty($orders->id)) {
        $validate = "no";
    } else {
        $validate = "buy_need";
    }

    return view('account', compact('orders', 'trails', 'validate', 'orderscount'));

});

//For Keypoints

Route::get('account_keypoints', function () {

    if (Auth::check()) {

        $validate = "";

        $orders = Order::where('auth_id', Auth::id())->orderBy('created_at', 'DESC')->first();

        if (@$orders->trial_account_status == "inprogress") {

            $validate = "yes";

            $trail_start_date = date('Y-m-d', strtotime($orders->trial_account_date));
            $trail_end_date = date('Y-m-d');
            // $trail_end_date = "2021-06-23";
            $date1 = date_create($trail_start_date);
            $date2 = date_create($trail_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");

            if ($betweendate <= $orders->trial_account_days) { //30days checking
                $validate = "yes";

                $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                $user_signed_in = true;

            } else {

                $validate = "yes";

                $order_update = Order::find($orders->id);
                $order_update->trial_account_status = "completed";
                $order_update->trail_finish_date = date('Y-m-d');
                $order_update->save();

                $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
                $buy_end_date = date('Y-m-d');
                // $buy_end_date = "2021-05-22";
                $date1 = date_create($buy_start_date);
                $date2 = date_create($buy_end_date);
                $diff = date_diff($date1, $date2);
                $betweendate = $diff->format("%a");

                if ($betweendate <= $orders->buy_account_date) { //30days checking

                    $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                    $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                    $user_signed_in = true;

                } else {
                    $validate = "yes";
                    $order_update = Order::find($orders->id);
                    $order_update->buy_account_status = "completed";
                    $order_update->buy_finish_date = date('Y-m-d');
                    $order_update->save();

                    $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
                    $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                    $user_signed_in = false;
                }

            }

        } else if (@$orders->buy_account_status == "inprogress") {



            $buy_start_date = date('Y-m-d', strtotime($orders->buy_account_date));
            $buy_end_date = date('Y-m-d');
            // $buy_end_date = "2021-06-23";
            $date1 = date_create($buy_start_date);
            $date2 = date_create($buy_end_date);
            $diff = date_diff($date1, $date2);
            $betweendate = $diff->format("%a");

            if ($betweendate <= $orders->buy_account_days) { //30days checking

                $validate = "yes";

                $text_limit = env('REGISTER_USER_TEXT_LIMIT', 10000);
                $file_upload_size = env('REGISTER_USER_FILE_SIZE', 5000000);
                $user_signed_in = true;

            } else {

                $validate = "no";

                $order_update = Order::find($orders->id);
                $order_update->buy_account_status = "completed";
                $order_update->buy_finish_date = date('Y-m-d');
                $order_update->save();

                $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
                $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
                $user_signed_in = false;
            }

        } else {

            $validate = "no";

            $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
            $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
            $user_signed_in = false;
        }

    } else {

        $validate = "no";
        $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);
        $file_upload_size = env('UNREGISTER_USER_FILE_SIZE', 1000000);
        $user_signed_in = false;
    }

    $auth = Auth::id();
    $orders = Order::where('auth_id', Auth::id())->orderBy('id', 'DESC')->first();
    // dd($orders->toArray());
    $orderscount = Order::where('auth_id', Auth::id())->count();
    $trails = Order::where('auth_id', Auth::id())->orderBy('trial_account_date', 'DESC')->first();

    if (!empty($orders->id)) {
        $validate = "no";
    } else {
        $validate = "buy_need";
    }

    return view('account_keypoints', compact('orders', 'trails', 'validate', 'orderscount'));

});

Route::get('/makesession', function (Request $request) {
    Session::forget('fkey');
    if ($request->fkey == '1') {
        Session::put('fkey', 1);
    } else {
        Session::put('fkey', 2);
    }
    Session::save();
});

Route::get('/refund', function () {
    return view('refund');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/terms-keypoints', function () {
    return view('terms-keypoints');
});

Route::get('/privacy-keypoints', function () {
    return view('privacy-keypoints');
});

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/aihuman', function () {
    return view('aihuman');
});

Route::get('/keypoints', function () {
    return view('layouts.keypoints');
});
Route::get('/keypointsdev', function () {
    return view('layouts.keypointsDev');
});

Route::post('/payment_checks', function (Request $request) {

});



Route::post('/payment_check', 'HomeController@payment_check')->name('payment_check');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accountdetails', 'HomeController@accountdetails');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/auth/{provider}/callback', 'SocialController@callback');

Route::post('summarize', 'MainController@summarizeText');
Route::post('abs_summarize', 'NewPageMainController@summarizeText');
Route::get('ww', 'MainController@summarizeText');

Route::post('createppt', 'MainController@convertFile');
Route::post('convert_document', 'MainController@convertDocument');
Route::get('download', 'MainController@getDownload');
Route::post('highlight_pdf', 'MainController@highlightPdf');

/*Admin Panel*/
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');


Route::get('admin/users_export', 'HomeController@exportUsers')->middleware('admin');

/*Contact Us email*/
Route::post('/contactus', function (Request $request) {
    $send_email_to = env('MAIL_USERNAME', 'info@intellippt.com');

    $output = [];
    $output['message'] = '';

    $recaptcha = $request->input('recaptcha');
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');

    if ($name == '' || $email == '' || $message == '' || $recaptcha == '') {
        $output['message'] = "Fill in all details.";
        return response()->json($output, 401);
    }

    $client = new Client([
        'base_uri' => 'https://google.com/recaptcha/api/'
    ]);

    $response = $client->post('siteverify', [
        'query' => [
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $recaptcha
        ]
    ]);

    $gresponse = json_decode($response->getBody());
    Log::info('captacha response : ' . json_encode($gresponse));

    if ($gresponse->success) {
        $details = [
            'title' => 'Mail from intellippt.com',
            'name' => $name,
            'email' => $email,
            'message' => $message
        ];

        \Mail::to($send_email_to)->send(new \App\Mail\ContactsUs($details));

        $output['message'] = "We will get back to you shortly.";
        return response()->json($output, 200);
    } else {
        $output['message'] = "Google recaptcha failed. Please try again by refreshing the page.";
        return response()->json($output, 401);
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('convert_to_ppt', 'convert_ppt');
Route::view('summarization', 'summarization');

Route::post('/create-slides', 'MainController@createSlides');