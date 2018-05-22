<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelimeler;



class kelimeGir extends Controller
{
    public function kaydet(Request $request){


    		$validator=\Validator::make($request->all(),[

    			'ingilizce'=>'required',
    			'turkce'=>'required',
    			'aciklama'=>'max:80'
    		]);

    		
    		if($validator->fails()){

			return redirect()->back()->withErrors($validator)->withInput(); //hata varsa geri gönderir ve hataları gösterir.
			
			}

			else{

					$tr= $request->input('turkce');
					$en= $request->input('ingilizce');
					$aciklama=$request->input('aciklama');
					$yanAnlam=$request->input('yanAnlam');
			
					$user_id=\Auth::id();

					$kontrol=kelimeler::where('users_id',$user_id)->where('enKelime',$en)->count();

					if($kontrol==0){

					kelimeler::insert(['trKelime'=>$tr,'enKelime'=>$en,'users_id'=>$user_id,'aciklama'=>$aciklama,'yanAnlam'=>$yanAnlam]);

					return redirect()->back()->with('kaydet_msg','Yeni kelimeniz havuzunuza eklenmiştir');


					}

					else{
							
							return redirect()->back()->with('kaydet_error_msg','Havuzunuzda zaten böyle bir kelime mevcuttur.Farklı bir kelime için tekrar deneyin');
															

					}
					
			}






}//end kaydet function

}//end class