<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;


class adminUyelerIslemleri extends Controller
{
 
    public function uyeSil_GET(Request $request,$mail){

			User::where('email',$mail)->delete();

			return redirect()->back()->with('sil_msg','Bu kullanıcı silinmiştir.');

    }//end sil


     public function adminYap_GET(Request $request,$mail){
     		try {

     		User::where('email',$mail)->update(['isAdmin'=>'1']);



			return redirect()->back()->with('yetkilendirme_msg','Bu kullanıcı admin olmuştur.');
     			
     		} catch (Exception $e) {

     			return "$e";
     			
     		}
			

    }//end adminyap
     public function uyeYap_GET(Request $request,$mail){

     		try {

     		User::where('email',$mail)->update(['isAdmin'=>'0']);

			return redirect()->back()->with('uyeyap_msg','Bu admin artık  Üye olmuştur.');
     			
     		} catch (Exception $e) {

     			return "$e";
     			
     		}
			
    }//end uye yap

   

        public function adminEkle_Post(Request $request){

    		  try {

    		  	//\DB::table('users')->insert(['name'=>$isim,'email'=>$mail,'password'=>'parola','isAdmin'=>'1']);
    		  	$validator=\Validator::make($request->all(),[

    		  			'parola'=>'min:6',
    		  			'mail'   =>  "unique:users,email"
    		  			

    		  	]);

    		  	if($validator->fails()){
    		  							
    		  			return redirect()->back()->withErrors($validator);
    		  	 
    		  	}else{


    		  	   User::insert(['name'=>$request->isim,'email'=>$request->mail,'password'=>$request->parola,'isAdmin'=>'1','created_at'=>now()]);

                    return redirect()->back();// kişi eklendine dair mesaj verdir

    		  	}
    		  	
    		  } catch (Exception $e) {
    		  	
    		  	echo'Bir hata var  '.$e;	
    		  }




    }//end admin ekle post




}//end class
