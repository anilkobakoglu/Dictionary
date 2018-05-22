<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelimeler;
use Illuminate\Support\Facades\Auth;

class kelimeAlistirma extends Controller
{

    public function index(){

    	$user_id=\Auth::id();
    	$kelime_varmi=kelimeler::where(['users_id'=>$user_id])->whereNotNull('enKelime')->get();
    	
    	
    	if(!($kelime_varmi->isEmpty())){

		$random=kelimeler::where(['users_id'=>$user_id])
    	->get()
    	->random(1);
			foreach ($random as $row ) {
			    		$random= $row->enKelime; 
			    	
			return view('alistirma')->with('random',$random);
			}
		 }

		else{

			$hata_msg='havuzda kelime olmadığı için blade de hatayı göstericez';
			return view('alistirma',compact('hata_msg'));
		
		}  
    

    }//end index funtion

    public function cevapla(Request $request,$ingilizceKelime){

    	 $user_id=\Auth::id();
    	 $turkce=mb_strtolower($request->turkce,"UTF-8");
    	 $ingilizce=mb_strtolower($ingilizceKelime);

    	 $kelime=kelimeler::where('users_id',$user_id)
    	 			  ->where('enKelime',$ingilizce)
    	 			  ->where('trKelime',$turkce)
    	 			  ->get();


    	 if(!$kelime->isEmpty()){

    	 	return redirect()->back()->with('dogru_msg',$turkce);
    	 }

    	else if($kelime->isEmpty()){

    		 	$yanAnlam=kelimeler::where('users_id',$user_id)//eğer yanlış cevap verildiyse yan anlamlarında var mı diye bakıyoruz
    		 			  ->where('enKelime',$ingilizce)
    		 			  ->get();
    		 			  
    		   
    		   foreach($yanAnlam as $row)
    		   {
    		   		   $yan=explode(",",$row->yanAnlam);//yananlamları virgülle ayırıp dizi haline getiriyoruz.
    		   }//end foreach	

    		   	if(in_array($turkce,$yan)){// Yan anlamlarda bu kelime var mı diye kontrol işlemi
    		   							
    		   			return redirect()->back()->with("yanAnlam",$turkce); die();//bu kelimeyi geri atıyoruz ve blade de bu kelimenin yan anlamlarda olduuğunu belirtiyoruz
    		   	}
    		   	else{
    		   					// bu kelime yan dizisinde yoksa yanlış kelime girilmiştir.

    		   			$dogru_cevap=kelimeler::where('users_id',$user_id)
    		   						->where('enKelime',$ingilizce)
    		   						 ->pluck('trKelime');
    		   			return redirect()->back()->with(["yanlis_cevap"=>$turkce,"dogru_cevap"=>$dogru_cevap[0]]);die();
    		   					
    		   			}	
    		   		
 			 
    	}// end else if
    	
    }//end cevapla function
    	


}//end class
