<?php

namespace App\Http\Controllers;
use App\kart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\Storage;

class kartlar extends Controller
{
    public function anasayfa(){

    $id=Auth::id();

    	
    $count=kart::where("users_id",$id)->get();//id si sistem deki id ye eşit olan kişilerin kart bilgilerini çeker

    if($count->count()==0){//kart id ye ait kart bilgileri yok

    	$kart_yok="Daha önce hazırlanılmış bir kartınız mevcut değildir";
    	return view('kartlar',compact('kart_yok'));

    	
    }
    else {// bu id ye ait kart bilgileri var.

        $kartlar=kart::where('users_id',$id)->paginate('5');//bu id ye ait kartların bilgileri compact edilecek..
    
        return view('kartlar',compact("kartlar"));
    	
    }

}//end anasayfa

public function kartekle(Request $request){


   $file=$request->file('resim');

   $turkce=$request->input('turkce');

   $ingilizce=$request->input('ingilizce');
   

   $validator=\Validator::make($request->all(),[

         'resim' => 'required|mimes:jpeg,png,jpg,gif,svg|max:8024', //dosyayı süzgeçten kurallar süzgecinden geçiriyoruz.
         'turkce' => 'required',
         'ingilizce' =>'required'

    ]);


    if($validator->fails()){

        return "validator hatası";
       return redirect()->back()->withErrors($validator);
    }

    else{
            $kontrol=kart::where('users_id',Auth::id())->where('ingilizce',$ingilizce)->count();//aynı kartı iki kere oluşturmasın diye yapılan bir kontrol

            if($kontrol!=0){

                    

                   return redirect()->back()->with('ayni_kart_hatasi',$ingilizce)->withInput();//Bu kelimeyi blade sayfasında hata ile göstermek için o sayfaya geri gönderiyorum
            }
            else{//eğer böyle bir kelieme yoksa kaydetme işlemi yapılsın
                    


                $isim=$file->getClientOriginalName();//dosyanın gerçek ismi

                $uzanti= $file->getClientOriginalExtension();//dosyanın uzantısı

                $yeni_isim=date('Y-m-d').'_'.str_random(10).'.'.$uzanti;//örneğin 2017-11-17_SqwFW16cuo.jpg 

                $dosya_ismi="kartlar_img";// hangi dosyaya yükleneceğini belirliyoruz

                $file->move($dosya_ismi,$yeni_isim);//bu dosyaya yeni ismiyle yükle


                try{



                $ekle=new kart; //Modelimizi ekle değişkenine atıyoruz

                 $ekle->users_id=Auth::id();

                 $ekle->kart_isim=$yeni_isim;

                 $ekle->turkce=$turkce;

                 $ekle->ingilizce=$ingilizce;

                $ekle->save();//en sonda da bu işlemleri kaydettik ve verimiz eklendi.
                }
                catch(\Exception $e){

                        return $e;

                }

               return redirect()->back();
        }

    }

}//end kartekle




public function kartsil(Request $request, $value){

      $resim_isim=kart::where(['users_id'=>Auth::id(),'ingilizce'=>$value])->value('kart_isim');
      $resim_yolu=public_path().'\kartlar_img\\'.$resim_isim; // örneğin : C:\Users\ANIL\Desktop\laravelako\public\kartlar_img\2018-05-12_miuNyP7zyB.jpg



      try{

          kart::where(['users_id'=>Auth::id(),'ingilizce'=>$value])->delete();
          unlink($resim_yolu);

          return redirect()->back()->with('silme_islemi','silme işlemi başarı ile gerçekleştirilmiştir');
       

      }

      catch(\Exception $e){

                return $e; 
      }       
       
}//end kartsil


}//end 
