<?php

namespace App\Http\Controllers;
use \Stichoza\GoogleTranslate\TranslateClient;

use Illuminate\Http\Request;
class google extends Controller
{

	public function google(Request $request,$ilkDİl,$ikinciDil,$kelime){

	$lang = new TranslateClient();
	echo $lang->setSource($ilkDİl)->setTarget($ikinciDil)->translate($kelime);
	
	}
    


}
