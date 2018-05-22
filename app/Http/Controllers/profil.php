<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kart;
use App\User;
use App\kelimeler;
use Illuminate\Support\Facades\Auth;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\Hash;

class profil extends Controller
{
    public function anasayfa(){


    	$isim=User::where('id',Auth::id())->value('name');
		$isim=ucwords($isim);//ilk harf büyük
    	$kart_sayisi=kart::where('users_id',Auth::id())->count();
    	$kelime_sayisi=kelimeler::where('users_id',Auth::id())->count();
    	$anasayfa="anasayfa";//bu veriyi bladeye göndermek istiyorum eğer sadece profile tıklandıysa profil bilgileri gözüksün diye aşağıda da ayarlar diye veri gönderilecek, eğer profili düzenleye tıklandıysa blade de o kısım aktif olacak diye yapıldı, bunların sebebi tek blade de iki sayfa açmak
    	return view('profil',compact(['isim','kart_sayisi','kelime_sayisi','anasayfa']));

    }//end anasayfa




    public function ayarlar(){ //

    	$kullanici_adi=User::where('id',Auth::id())->value('name');
    	$mail=User::where('id',Auth::id())->value('email');
    	$profil_ayarlari="ayarlar";
    	return view('profil',compact('profil_ayarlari','kullanici_adi','mail'));


    }//end ayarlar


     public function ayarlar_post(Request $request){// PROFİL AYARLARI BÖLÜMÜ (resim, kullanıcı adı ve mail değiştrime alanları)

         $mail=$request->input('mail');
         $kullanici_adi=$request->input('kullanici_adi');

           $validator=\Validator::make($request->all(),[

            'kullanici_adi'=>'required',
            'mail'=>'required|email'
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput($request->all())->withErrors($validator);
            
        }
        else{

            try{

                 User::where('id',Auth::id())->update(['name'=>$kullanici_adi,'email'=>$mail]);
                 return redirect()->back()->withInput()->with('basarili_islem','Profil bilgileriniz başarılı bir şekilde güncellenmiştir');
            }

            catch(\ Exception $e){

                    return "Bir problem var".$e;

            }
        }
               

    }//end ayarlar post




    public function parola(){

    	
    	$parola_ayarlari="ayarlar";
    	return view('profil',compact('parola_ayarlari'));



    }//end parola





    public function parola_post(Request $request){

              $eski=$request->input('eski');
              $yeni=$request->input('yeni');
              $tekrar=$request->input('tekrar');
              

              $user_parola=User::where('id',Auth::id())->value('password');
              $user=Auth::user();

             $validator=\Validator::make($request->all(),[

                'eski'=>'required',
                'yeni'=>'required|min:6',
                'tekrar'=>'required|same:yeni|min:6'
                
            ]);

             if($validator->fails()){

                    return redirect()->back()->withInput($request->all)->withErrors($validator); die();
                }
             

              if (Hash::check($eski, $user_parola))//girilen şifre db deki şifre ile aynı mı?
                {
                    try{

                    $user = Auth::user();
                    $user->password = bcrypt($request->get('yeni'));//yeni şifresini güncelliyoruz
                    $user->save();
                    }
                    catch(\Exception $e){

                            return $e;
                    }
                    
                    return redirect()->back()->with('islem_basarili','Şifreniz başarılı bir şekilde değiştirilmiştir');

                }
              else {


                 return redirect()->back()->withInput($request->all)->with('parola_error','Girmiş olduğunuz parola doğru değil');
              }  
                           
    }//end parola_post




    public function sil(){
    	
    	$sil="sil";
    	return view('profil',compact('sil'));

    }//end sil


    public function sil_post(Request $request){

           if($request->filled('onay')){
               
               try{
                        
                        $user = new User;
                        $user= $user->find(Auth::id());
                        $user->delete();
                        return redirect('/cikis');

               }
               catch(\Exception $e){

                return $e;
               }
                
           }
           else{

            return redirect()->back()->with('sil_error','Bu işlemi gerçekleştirmek için onay kutucuğunu işaretle');
           }

    }//end sil post

}//end class
