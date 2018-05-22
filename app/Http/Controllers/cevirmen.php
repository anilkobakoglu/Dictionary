<?php

namespace App\Http\Controllers;
use \Stichoza\GoogleTranslate\TranslateClient;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;


class cevirmen extends Controller
{
   

    public function anasayfa(Request $request){

	//$lang = new TranslateClient();
    //$lang=$lang->setSource($ilkDil)->setTarget($ikinciDil)->translate($metin);

//echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

	return view('ceviri');
    
}//end anasayfa

public function translate(Request $request){

 


	$lang = new TranslateClient();
  echo $lang->setSource($request->input("ilkDil"))->setTarget($request->input("ikinciDil"))->translate($request->input("metin"));

 

}//end translate

}