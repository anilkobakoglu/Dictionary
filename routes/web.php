<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('giris');
});






//kelime işlemleri

route::group(['middleware'=>'userControl'],function(){

        route::view('/anasayfa','/anasayfa');
        
        route::get('deneme','denemeController@index');
        Route::post('kelimeGir','kelimeGir@kaydet');

        Route::view('kelimegir','anasayfa');

        Route::get('ayrintiligoster/{enKelime}','kelimeGoster@ayrintili_kelime');
        Route::get('kelimelerim','kelimeGoster@index');

        Route::get('kelimesil/{kelime}','kelimeSil@index');

        Route::get('kelimeguncelle/{enKelime}/{trKelime}','kelimeGuncelle@index');
        //blade de formu görünür yapmak için.
        Route::post('kelimeguncelle/{enKelime}/{trKelime}','kelimeGuncelle@update');
        //kelimeyi güncellemek için
         Route::get('/kelimelerim/indir','indir@indir');

        route::post('kelimeara','kelimeAra@index');

        route::get('alistirma','kelimeAlistirma@index');
        route::post('alistirma/{cevapla}','kelimeAlistirma@cevapla');

        Route::get('/ceviri','cevirmen@anasayfa');
        Route::post('/ceviri/translate','cevirmen@translate');
       


        route::get("/kartlar","kartlar@anasayfa");
        route::post("/kartekle","kartlar@kartekle");
        route::get("kartlar/sil/{en}",'kartlar@kartsil');


          route::get('profil','profil@anasayfa');
          route::get('profil/ayarlar','profil@ayarlar');
          route::post('profil/ayarlar','profil@ayarlar_post');
          route::get('profil/ayarlar/parola','profil@parola');
          route::post('profil/ayarlar/parola','profil@parola_post');

          route::get('profil/ayarlar/hesapsil','profil@sil');
          route::post('profil/ayarlar/hesapsil','profil@sil_post');


        

        
});
//end kelime işlemleri

//admin        

      Route::group(['prefix'=>'admin','middleware'=>'adminKontrol'],function(){

        
        route::get('anasayfa','adminController@anasayfa');
        route::get('/','adminController@anasayfa');
        route::get('/uyeler','adminController@uyeGoster_GET');
        route::get('/adminler','adminController@adminGoster_GET');
        route::get('/kelimeler','adminController@kelimeGoster_GET');
        route::post('/kelimeler/kelimeara','adminKelimeController@kelimeAra_GET');

        
        route::post('/adminler/adminekle','adminUyelerIslemleri@adminEkle_POST');//Yapılmadı yapılınca Sil

        route::get('uyeler/sil/{mail}','adminUyelerIslemleri@uyeSil_Get');
        route::get('uyeler/adminyap/{mail}','adminUyelerIslemleri@adminYap_Get');
        route::get('uyeler/uyeyap/{mail}','adminUyelerIslemleri@uyeYap_Get');


   


          
     });

//end admin

  // Authentication Routes...
        $this->get('giris', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('giris', 'Auth\LoginController@login');
        $this->post('cikis', 'Auth\LoginController@logout')->name('logout');
         $this->get('cikis', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('kaydol', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('kaydol', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
//end Authentication Routes...





