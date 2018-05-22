<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
use App\kelimeler;
use Illuminate\Support\Facades\Auth;

class kelimeGoster extends Controller
{
   
public function index(){


$user_id=\Auth::id();

$kelimeler=kelimeler::where('users_id',$user_id)->paginate(5);

$kelimelerSayi=kelimeler::where('users_id',$user_id)->count();// bu lişiye ait kelime var mı diye bakıcam

if($kelimelerSayi>0)//eğer kelime sayısı birden büyükse kelimeleri göndersin
{
	
	return view('kelimelerim',compact('kelimeler'));


}

else{

$hata="Havuzunuzda hiç bir kelime bulunmamaktadır";

	return view('kelimelerim',compact('hata'));
	
}




}//end index function


public function ayrintili_kelime(Request $request, $enKelime){

	$en=$enKelime;

    $user_id=Auth::id();

    $kelimeler=kelimeler::where('users_id',$user_id)->where('enKelime',$en)->get();

    	if($kelimeler->count()){ // tıklandında böyle bir kelime olur muhakkak ama elle urlden girilirse diye

			foreach($kelimeler as $row){

			    			$tr=$row->trKelime;
			    			$aciklama=$row->aciklama;
			    			$yan=$row->yanAnlam;
			    	}


			return redirect()->back()->with(['ayrinti_en'=>$en,'ayrinti_tr'=>$tr,'ayrinti_yan'=>$yan,'ayrinti_aciklama'=>$aciklama]);		    	

		}else{


			return  redirect('kelimelerim');
		}

    	

    	//echo $tr.$aciklama.$yan;






}


}//end class
