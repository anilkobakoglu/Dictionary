<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\kelimeler;
use App\user;

class adminKelimeController extends Controller
{
    public function kelimeAra_GET(Request $request){

    		$kelime= $request->kelimeAra;

    		$kontrol=kelimeler::where('enKelime',$kelime)->orWhere('trKelime',$kelime)->value('trKelime','enKelime','yanAnlam');

    		if(empty($kontrol)){//bu kelimenin ne türkçe nede ingilizce karşılığı yoksa

    				return redirect()->back()->with('kelimeYok_msg','aradığınız kelime yok');

    		}else{

    				$enKontrol=kelimeler::where('enKelime',$kelime)->value('trKelime');//bu kelime İngilizce kelimeler arasında varsa Türkçesini çek
    				$trKontrol=kelimeler::where('trKelime',$kelime)->value('enKelime');//bu kelime Türkçe kelimeler arasında varsa İngilizcesini çek

    				//En kontrol içinde türkçe enKontrol içinde ingilice kelime var..
    				 
    				if(!empty($enKontrol)){ //girilen kelime ingilizce ise yukarıda türkçesini çekmiştik..
    					
    					$kelimeAyrintilar=kelimeler::where('trKelime',$enKontrol)->get();//girilen kelimenin diğer ayrıntılarını get ile alıyoruz.
	    					
	    					foreach ($kelimeAyrintilar as $row ) {

	    						$cevap=$row->trKelime;//ingilizce kelime girildiği için cevap türkçe kelime olacak
	    						$aciklama=$row->aciklama;
	    						$yanAnlam= $row->yanAnlam;
	    						$user_id = $row->users_id;
								$tarih= $row->created_at;
	    					}

    						$kullaniciAyrintilar=user::where("id",$user_id)->get();

	    					foreach ($kullaniciAyrintilar as $row) {
	    							
	    							$kullaniciAdi= $row->name;
	    							$kullaniciMail= $row->email;
	    					}
    						


    					 return redirect()->back()
    					 ->with(['cevap_msg'=>$cevap,
    					 	'yanAnlam'=>$yanAnlam,
    					 	'aciklama'=>$aciklama,
    					 	'tarih'=>$tarih,
    					 	'kullaniciAdi'=>$kullaniciAdi,
    					 	'kullaniciMail'=>$kullaniciMail])
    					 ->withInput();

    					}

    				else if(!empty($trKontrol)){

    					
    					 $kelimeAyrintilar=kelimeler::where('enKelime',$trKontrol)->get();//girilen kelimenin diğer ayrıntıları..

    					 foreach ($kelimeAyrintilar as $row ) {

	    						$cevap=$row->enKelime;//Türkçe kelime girildiği için cevap ingilizce kelime olacak
	    						$aciklama=$row->aciklama;
	    						$yanAnlam= $row->yanAnlam;
	    						$user_id = $row->users_id;
								$tarih= $row->created_at;
	    					}

	    					$kullaniciAyrintilar=user::where("id",$user_id)->get();

	    					foreach ($kullaniciAyrintilar as $row) {
	    							
	    							$kullaniciAdi= $row->name;
	    							$kullaniciMail= $row->email;
	    					}

	    				return redirect()->back()
    					 ->with(['cevap_msg'=>$cevap,
    					 	'yanAnlam'=>$yanAnlam,
    					 	'aciklama'=>$aciklama,
    					 	'tarih'=>$tarih,
    					 	'kullaniciAdi'=>$kullaniciAdi,
    					 	'kullaniciMail'=>$kullaniciMail])
    					 ->withInput();

    					
    					

    				}		
    		}//end else


    }//end function
}//end class
