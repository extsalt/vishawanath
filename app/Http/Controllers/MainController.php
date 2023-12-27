<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
use App\aiuse;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public $successStatus = 200;
    public $invalidStatus = 401;

    public function apiCounter($api_name)
    {
        $id = DB::table('api_stats')->insertGetId(
            ['api_name' => $api_name]
        );
    }

    public function summarizeText(Request $request)
    {
        $text_limit = 0;
        $output = [];
        $output['message'] = "";

        $isai = $request->input('isai');
        $issignedin = $request->input('signedin');

        $split = $request->input('splittext');
        if (Auth::check()) {
            if ($isai == "true") {
                $text_limit = 3000;
            } else {

                $text_limit = 50000;

            }
            // $text_limit = env('REGISTER_USER_TEXT_LIMIT',50000);
        } else {
            $text_limit = env('UNREGISTER_USER_TEXT_LIMIT', 3000);

        }

        $text = $request->input('text');

        $text_length = mb_strlen($text);
        if ($text_length > $text_limit) {
            $output['message'] = $text_limit . " characters limit to use this feature. Your text length is " . $text_length;
            return response()->json($output, $this->invalidStatus);
        }
        if ($text_length == 0) {
            $output['message'] = "Please enter some text and click Summarize button";
            return response()->json($output, $this->invalidStatus);
        }

        $percentage = $request->input('perc');
        // return $text;
        // return $isai;
        if ($isai == 'false') {

            //$url = env('API_BASE_URL','https://pdftoppt-3ycpbcnmea-uc.a.run.app/').'/summarize_text';
            $url = env('API_BASE_URL', '45.79.123.254:5000') . '/summarize_text';

            $params = [];
            $params['data'] = $text;
            $params['perc'] = (int)filter_var($percentage, FILTER_SANITIZE_NUMBER_INT);

            $payload = json_encode($params);

            Log::info('Url : ' . $url . '.... payload : ' . $payload);

            $cURL = curl_init();
            curl_setopt($cURL, CURLOPT_URL, $url);
            curl_setopt($cURL, CURLOPT_POST, 1);
            curl_setopt($cURL, CURLOPT_POSTFIELDS, $params);
            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($cURL);

            Log::info('Output : ' . $result);
            if ($result != '') {
                //$result = str_replace("\.", "\. <br/><br/>", $result);
                $result = str_replace("\n", "<br/><br/>", $result);
                if (!trim($result) == '') {
                    $this->apiCounter('summarize_text');
                }
            }
            $output['text'] = $result;
            curl_close($cURL);

            return response()->json($output, $this->successStatus);

        } else {
            if ($issignedin == 'true') {
                if ($split == 'false') {


                    $curl = curl_init();
                    aiuse::where('user_id', Auth::id())->first()->increment('numberofuses');

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => '101.53.133.45:5000/detailed_summ',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('data' => $text, 'secret' => 'secret'),
                    ));

                    $result = curl_exec($curl);
                    Log::info('Url : ' . "101.53.133.45:5000/detailed_summ" . '.... payload : ' . $text);

                    Log::info('Output : ' . $result);
                    if ($result != '') {
                        $result = str_replace("\n", "<br/><br/>", $result);
                        // if(!trim($result) == '')
                        // {
                        //         $this->apiCounter('summarize_text');
                        // }
                    }
                    $output['text'] = $result;
                    curl_close($curl);
                    return response()->json($output, $this->successStatus);
                } else {

                    $curl = curl_init();
                    aiuse::where('user_id', Auth::id())->first()->increment('numberofuses');

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => '101.53.133.45:5000/brief_summ',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('data' => $text, 'secret' => 'secret'),
                    ));

                    $result = curl_exec($curl);
                    Log::info('Url : ' . "101.53.133.45:5000/brief_summ" . '.... payload : ' . $text);

                    Log::info('Output : ' . $result);
                    if ($result != '') {
                        $result = str_replace("\n", "<br/><br/>", $result);
                        // if(!trim($result) == '')
                        // {
                        //         $this->apiCounter('summarize_text');
                        // }
                    }
                    $output['text'] = $result;
                    curl_close($curl);
                    return response()->json($output, $this->successStatus);

                }


            } else {
                $numofai = aiuse::where('user_id', Auth::id())->first()->numberofuses;
                if ($numofai <= 100) {
                    if ($split == 'false') {


                        $curl = curl_init();
                        aiuse::where('user_id', Auth::id())->first()->increment('numberofuses');

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => '101.53.133.45:5000/detailed_summ',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('data' => $text, 'secret' => 'secret'),
                        ));

                        $result = curl_exec($curl);
                        Log::info('Url : ' . "101.53.133.45:5000/detailed_summ" . '.... payload : ' . $text);

                        Log::info('Output : ' . $result);
                        if ($result != '') {
                            $result = str_replace("\n", "<br/><br/>", $result);
                            // if(!trim($result) == '')
                            // {
                            //         $this->apiCounter('summarize_text');
                            // }
                        }
                        $output['text'] = $result;
                        curl_close($curl);
                        return response()->json($output, $this->successStatus);
                    } else {

                        $curl = curl_init();
                        aiuse::where('user_id', Auth::id())->first()->increment('numberofuses');

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => '101.53.133.45:5000/brief_summ',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('data' => $text, 'secret' => 'secret'),
                        ));

                        $result = curl_exec($curl);
                        Log::info('Url : ' . "101.53.133.45:5000/brief_summ" . '.... payload : ' . $text);

                        Log::info('Output : ' . $result);
                        if ($result != '') {
                            $result = str_replace("\n", "<br/><br/>", $result);
                            // if(!trim($result) == '')
                            // {
                            //         $this->apiCounter('summarize_text');
                            // }
                        }
                        $output['text'] = $result;
                        curl_close($curl);
                        return response()->json($output, $this->successStatus);

                    }
                } else {

                    $output['message'] = "You exceeded the maximum limit of AI summarization for free user";
                    return response()->json($output, $this->invalidStatus);

                }

            }


        }
        // $output['message'] = $isai;

        // return response()->json($output, $this->successStatus);


    }

    public function convertDocument(Request $request)
    {
        $output = [];
        $output['message'] = "";

        // dd($request->all());


        if ($request->hasFile('userfile')) {
            $file = $request->file('userfile');

            $fileExt = $file->extension();
            $randomFilePrepend = time();
            $rand = rand(1, 10000);

            $fileName = $rand . '_' . $randomFilePrepend . '.' . $fileExt;
            $outputFileName = $randomFilePrepend . '.pptx';


            $file->move(public_path('uploads'), $fileName);

            if ($fileExt == 'pdf') {
                $endpoint = "pdf_to_text";
            } else if ($fileExt == 'docx') {
                $endpoint = "docx_to_text";
            } else {
                $output['message'] = "Only PDF & Docx Files are permitted.";
                $localfile = public_path('uploads') . "/" . $fileName;
                unlink($localfile);
                return response()->json($output, $this->invalidStatus);
            }

            //$url = env('API_BASE_URL','https://pdftoppt-3ycpbcnmea-uc.a.run.app/').'/'.$endpoint;
            $url = env('API_BASE_URL', '45.79.123.254:5000') . '/' . $endpoint;

            $localfile = public_path('uploads') . "/" . $fileName;
            $outputFile = public_path('uploads') . "/" . $outputFileName;

            $params = [];
            $params['file'] = curl_file_create($localfile, $_FILES['userfile']['type'], $fileName);

            $payload = json_encode($params);


            Log::info('Url : ' . $url . '.... payload : ' . $payload);

            $cURL = curl_init();
            curl_setopt($cURL, CURLOPT_URL, $url);
            curl_setopt($cURL, CURLOPT_POST, 1);
            curl_setopt($cURL, CURLOPT_POSTFIELDS, $params);
            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);

            $results = curl_exec($cURL);
            //Viswanath commented this to solve the issue caused by space after full stop
            //$result = preg_replace("/\r/", " ", $results);
            $result = $results;
            //$result = preg_replace("/\r|\n/", " ", $results);


            curl_close($cURL);
            Log::info('Output : ' . $result);

            if ($result == "0") {
                $output['message'] = "We are unable to process the file as it is empty.";
                unlink($localfile);
                return response()->json($output, $this->successStatus);
            }
            //Viswanath commented this to solve the issue caused by space after full stop
            //$result = str_replace("\n", "<br/><br/>", $result);

            $output['text'] = $result;
            $this->apiCounter($endpoint);
            unlink($localfile);

        }

        return response()->json($output, $this->successStatus);
    }

    public function getDownload(Request $request)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file_id = $request->input('file_id');
        $file = public_path('uploads') . "/" . $file_id;

        $headers = array(
            'Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation',
        );

        //return Response::download($file, 'filename.pdf', $headers);
        return response()->download($file, $file_id, $headers);
    }

    public function convertFile(Request $request)
    {
        $output = [];
        $output['message'] = "";
        if (!Auth::check()) {
            //$output['message'] = "<a href='/register'>Register</a> / <a href='/login'>SignIn</a> to use this feature.";
            return response()->json($output, $this->invalidStatus);
        }


        if ($request->hasFile('userfile')) {
            $file = $request->file('userfile');

            $fileExt = $file->extension();
            $randomFilePrepend = time();

            $fileName = $randomFilePrepend . '.' . $fileExt;
            $outputFileName = $randomFilePrepend . '.pptx';


            $file->move(public_path('uploads'), $fileName);

            if ($fileExt == 'pdf') {
                $endpoint = "convert_pdf";
            } else if ($fileExt == 'docx') {
                $endpoint = "convert_docx";
            } else {
                $output['message'] = "Only PDF & Docx Files are permitted.";
                return response()->json($output, $this->invalidStatus);
            }

            //$url = env('API_BASE_URL','https://pdftoppt-3ycpbcnmea-uc.a.run.app/').'/'.$endpoint;
            $url = env('API_BASE_URL', '45.79.123.254:5000') . '/' . $endpoint;

            $localfile = public_path('uploads') . "/" . $fileName;
            $outputFile = public_path('uploads') . "/" . $outputFileName;

            $params = [];
            $params['file'] = curl_file_create($localfile, $_FILES['userfile']['type'], $fileName);

            $payload = json_encode($params);

            Log::info('Url : ' . $url . '.... payload : ' . $payload);

            $cURL = curl_init();
            curl_setopt($cURL, CURLOPT_URL, $url);
            curl_setopt($cURL, CURLOPT_POST, 1);
            curl_setopt($cURL, CURLOPT_POSTFIELDS, $params);
            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($cURL);
            curl_close($cURL);
            Log::info('Output : ' . $result);

            if ($result=="0")
            {
                $output['message'] = "We are unable to process the file as it is empty.";
                return response()->json($output, $this->successStatus);
            }

            //$output = "File will be emailed";
            $file = file_put_contents($outputFile, $result);
            $output['file_id'] = $outputFileName;
            $output['message'] = "File processed successfully.";
            //public_path('uploads')
            $this->apiCounter($endpoint);
        }

        return response()->json($output, $this->successStatus);
    }
    public function highlightPdf(Request $request)
    {
        if (!$request->hasFile('file') || $request->file('file')->getClientOriginalExtension() != 'pdf') {
            return response()->json(['message' => 'Pdf file is missing'], 422);
        }

        $percentage = $request->get('percentage');

        if (empty($percentage)) {
            return response()->json(['message' => 'Percentage is missing'], 422);
        }

        $paidUser = $request->get('paidUser');

        if (empty($paidUser)) {
            return response()->json(['message' => 'User details are missing'], 422);
        }

        $paidUser = $paidUser == 'no' ? 0 : 1;

        $file = $request->file('file');
        $response = null;
        try {
            $response = (new Client())->request('POST', '45.79.123.254:5000/pdf_highlight', [
                'multipart' => [
                    [
                        'name' => 'paiduser',
                        'contents' => $paidUser
                    ],
                    [
                        'name' => 'perc',
                        'contents' => $percentage
                    ],
                    [
                        'name' => 'file',
                        'contents' => $file->getContent(),
                        'filename' => $file->getClientOriginalName()
                    ]
                ]
            ]);
        } catch (Exception $exception) {
            Log::error('pdf_hightlight', [$exception->getMessage()]);
            return response()->json(['message' => $exception->getMessage()], 400);
        }

        if ($response->getStatusCode() == 200) {
            $tmpFile = Str::random() . '.' . $file->getClientOriginalExtension();
            //$outputFile = "/uploads/".$tmpFile;
            //$outputFile = public_path('uploads')."/".$tmpFile;
            //$file_contents = file_put_contents(public_path($tmpFile), $response->getBody());
            $outputFile = "uploads/" . $tmpFile;
            //$outputFile = public_path('uploads')."/".$tmpFile;
            file_put_contents($outputFile, $response->getBody());

            return response()->json(['file' => url($outputFile)]);
        }

        return response()->json(['message' => 'Request failed'], 400);
    }

    public function createSlides(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['message' => 'Pdf/docx/doc file is missing']);
        }
        $fileType = $request->file('file')->getClientOriginalExtension();
        if (!in_array(strtolower($fileType), ['pdf', 'docx', 'doc'])) {
            return response()->json(['message' => 'Invalid file']);
        }
        $pageRange = $request->get('page_range');
        if ($fileType == 'pdf' && empty($pageRange)) {
            return response()->json(['message' => 'Page range is missing']);
        }
        $response = $fileType == 'pdf'
            ? $this->createPPTFromPDF($request->file('file'), $pageRange)
            : $this->createPPTFromDOCX($request->file('file'));
        if ($response->getStatusCode() == 200) {
            $tmpFile = Str::random() . '.ppt';
            $outputFile = public_path() . '/' . $tmpFile;
            file_put_contents($outputFile, $response->getBody());
            return response()->json(['file' => url('/' . $tmpFile)]);
        }
        return response()->json(['message' => 'Error occurred']);
    }

    private function createPPTFromPDF($file, $pageRange)
    {
        try {
            $response = (new Client())->request('POST', '45.79.123.254:5000/convert_pdf_gpt', [
                'multipart' => [
                    ['name' => 'range', 'contents' => $pageRange],
                    ['name' => 'file', 'contents' => $file->getContent(), 'filename' => $file->getClientOriginalName()]
                ]
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), ['create_slide']);
            return response()->json(['message' => $exception->getMessage()]);
        }
        return $response;
    }

    private function createPPTFromDOCX($file)
    {
        try {
            $response = (new Client())->request('POST', '45.79.123.254:5000/convert_docx_gpt', [
                'multipart' => [
//                    ['name' => 'range', 'contents' => $pageRange],
                    ['name' => 'file', 'contents' => $file->getContent(), 'filename' => $file->getClientOriginalName()]
                ]
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), ['create_slide']);
            return response()->json(['message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function createSlidesFromPrompt(Request $request)
    {
        $prompt = preg_replace('/\R+/', " ", $request->get('prompt'));
        if (empty($prompt)) {
            return response()->json(['message' => 'Invalid prompt']);
        }
        try {
            $response = (new Client())->request('POST', '45.79.123.254:5000/create_ppt_prompt_gpt', [
                'multipart' => [['name' => 'prompt', 'contents' => $prompt]]
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
        if ($response->getStatusCode() == 200) {
            $tmpFile = Str::random() . '.ppt';
            $outputFile = public_path() . '/' . $tmpFile;
            file_put_contents($outputFile, $response->getBody());
            return response()->json(['file' => url('/' . $tmpFile)]);
        }
        return response()->json(['message' => 'Error occurred']);
    }

    private function parsePageRange($pageRange)
    {
        $pageRange = preg_replace("\s+", '', $pageRange);
        if (Str::contains(',', $pageRange)) { # 1,3,4,
            $pageRange = array_filter(explode(',', $pageRange));
        } else if (Str::contains('-', $pageRange)) { # 1-2
            $pageRange = array_filter(explode('-', $pageRange));
        } else {
            $pageRange = [intval($pageRange)]; # 4
        }
        return collect($pageRange)->map(function ($page) {
            return intval($page);
        });
    }
}
