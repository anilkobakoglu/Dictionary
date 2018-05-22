<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\kelimeler;



class kelimeSil extends Controller
{
    public function index(Request $request,$kelime){

   $user_id=\Auth::id();


	
		$a=kelimeler::where('users_id',$user_id)->where('enKelime',$kelime)->delete();
   		
   		if($a){

   			return redirect()->back()->with('sil_msg','Silme işlemi başarı ile gerçekleştirilmiştir.');

   		}
   		else{
			return view('kelimelerim')->back()->with('guncelle_msg','Silmek istediğin kelime havuzunda bulunmamaktadır.');

   		}






	


    }//end function
}//end class
