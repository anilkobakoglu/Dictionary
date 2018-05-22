<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\kelimeler;
use Illuminate\Support\Facades\Auth;

class kelimeGuncelle extends Controller
{
	

    public function index(Request $request, $enKelime,$trKelime){

    	$user_id=\Auth::id();

        $en=$enKelime;
        $tr= $trKelime;

        $kelimeler=kelimeler::where('users_id',$user_id)->where('enKelime',$enKelime)->get();

        if($kelimeler->count()){

                    foreach ($kelimeler as $row) {
                            
                            $aciklama=$row->aciklama;
                            $yanAnlam=$row->yanAnlam;

                    }

        return redirect()->back()->with(['enKelime'=>$en,'trKelime'=>$tr,'yanAnlam'=>$yanAnlam,'aciklama'=>$aciklama]);


        }else{

            echo'yok';
        }
            

    }//end function


    public function update(Request $request,$enKelime,$trKelime){


    		$validator=\Validator::make($request->all(),[

    				'enKelime'=>'required',
    				'trKelime'=>'required'

    		]);

    		if($validator->fails()){ //hata varsa sayfada yazdırıyoruz

    			return redirect()->back()->withErrors($validator);

    		}else{

                $user_id=\Auth::id();
				$formEn=$request->enKelime;
				$formTr=$request->trKelime;
                $formAciklama=$request->aciklama;
                $formYanAnlam=$request->yanAnlam;

                $urlEn=$enKelime;
                $urlTr=$trKelime;


                kelimeler::where('users_id',$user_id)
                ->where(['enKelime'=>$urlEn,'trKelime'=>$urlTr])
                ->update([

                    'enKelime'=>$formEn,
                    'trKelime'=>$formTr,
                    'yanAnlam'=>$formYanAnlam,
                    'aciklama'=>$formAciklama

                    ]);


                return redirect()->back()->with('guncelle_msg','Güncelleme başarı ile tamanlanmıştır');
                
               // }

			}
			

    }//end function



}//end class