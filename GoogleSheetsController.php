<?php
namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Sheets;
use Illuminate\Http\Request;
use App\Http\Services\GoogleSheetsServices;
use App\Http\Controllers\GoogleSheetsController;
//use App\Http\Controllers\Input;
//use Illuminate\Support\Facades\Response;
//use Response;
//use App\Http\Controllers\client;
use vendor\autoload;

class GoogleSheetsController extends Controller
{
	public function GetSheetData()
	{
		// die();
	 $data = (new GoogleSheetsServices())->readSheet();
     return view('list', ['data' => $data]);
	 //print_r(json_encode($data));die;
	 //return view('list','$array');

	 //return view('list',['listing'=> $data]);
     //echo json_encode($data);
	 //return response()->json_encode($data);
	 //echo '<pre>';
	   // foreach($data as $key=>$value){
    //        echo'<pre>'; print_r($value); 
    //          }die;
	 }
	 //print_r($dt);die;
	
	 //return view('list', ['listing' => json_encode($data)]);
	 //return response()->json($data);
	
    public function appendSheet(Request $request)
		{
		  (new GoogleSheetsServices())->appendSheet([	
		  	 [$request->input('fname'),$request->input('lname')]
		  ]);
			
		
		  $data = (new GoogleSheetsServices())->readSheet();
		  return response()->json($data);
		}

           public function index()
          {
          	return view('insert');
          }
      


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function insertIntoSheet(Request $request)
		{     
		  //  echo $req;			 
		  (new GoogleSheetsServices())->writeSheet([
		   	  [$request->input('fname'),$request->input('lname')]
        	 
		   ]);
			
		
		   $data = (new GoogleSheetsServices())->readSheet();
		   return response()->json($data);
		}


// 	 public function getClient()
// 	{
// 		//require 'vendor/autoload.php';


    

// // The ID of the spreadsheet to retrieve data from.
//     $spreadsheetId = '1znLYqeQ8G6q_pPB6pGLvinMYRlRI1qS-cvxdoaxZC5M';  // TODO: Update placeholder value.
    
// // The A1 notation of the values to retrieve.
// 	$range = 'A1:J99';  // TODO: Update placeholder value.
// 	$response = $service->service->spreadsheets_values->get($spreadsheetId, $range);
//     //print_r($response);
//     return $response;
// 	}
}