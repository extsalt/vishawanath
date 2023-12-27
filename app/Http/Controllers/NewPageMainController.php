<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
Use App\aiuse;

class NewPageMainController extends Controller
{
    public $successStatus = 200;
    public $invalidStatus = 401;

    public function apiCounter($api_name)
    {
        $id = DB::table('api_stats')->insertGetId(
            ['api_name' => $api_name]
        );
    }

    public function summarizeText (Request $request)
    {
        $text_limit = 0;
        $output = [];
        $output['message'] = "";

        $split=$request->input('splittext');
                 $text_limit=50010;

        $text = $request->input('text');

        $text_length = mb_strlen($text);
        if ($text_length>$text_limit)
        {
            $output['message'] = $text_limit." characters limit to use this feature. Your text length is ".$text_length;
            return response()->json($output, $this->invalidStatus);
	    }
        if($text_length == 0)
        {
             $output['message'] = "Please enter some text and click Summarize button";
             return response()->json($output, $this->invalidStatus);
        }

        $percentage = $request->input('perc');

           $url = '101.53.133.45:5001/detailed_summ';

            $params = [];
            $params['data'] = $text;
    
            $payload = json_encode($params);
    
            Log::info('Url : '.$url.'.... payload : '.$payload);
                    $curl = curl_init(); 
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('data' => $text,'secret' => 'secret')));
    
            $result = curl_exec($curl);
    
            Log::info('Output : '.$result);
            if ($result!='')
            {
                $result = str_replace("\n", "<br/><br/>", $result);
            if(!trim($result) == '')
            {
                    $this->apiCounter('summarize_text');
            }
            
            $output['text'] = $result;
            curl_close($curl);
    
            return response()->json($output, $this->successStatus);

        }
                else{

                    $output['message'] = "You exceeded the maximum limit of AI summarization for free user";
                    return response()->json($output, $this->invalidStatus);
       
                }
                
           }
}
