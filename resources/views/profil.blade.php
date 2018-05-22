@extends('layouts.uye'){{--layouts uye den bazı tasarımları seçtik--}}
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">

<style type="text/css" media="screen">

/* profil aanasayfa bilgiler kısmı*/
.bilgiler img{
	
	height: 200px;
	width: 200pX;
	border:5px solid #f1f1f1;
	border-radius: 4px;

}
.bilgiler table{

	margin:auto;
	

}
.bilgiler td{

	padding: 6px 100px;
	font-size:25px;
	font-weight: bolder;
	color:#806e69;
}

#profili_düzenle_link {


		background-color: #0099cc;
		border: none;
		color: white;
		padding: 15px 15px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		margin: 4px 2px;
		font-size:12px;
		cursor: pointer; 

}

/* profil ayarlar  kısmı*/
.ayarlar table{

margin:auto;
margin-top: 40px;


}

.ayarlar_sekmeler{

	position:relative;
	height:40px;
	line-height:40px;
}

.sekme{
   float:left;
   height: 36px;
   width: 128px;
	margin:5px;
  font-family: sans-serif;
  color:white;
  line-height: 36px;/* yazı için*/
  text-align: center;
  background-color:#0099cc;
  border-radius: 8px
}
.sekme:hover{
  background-color:#AFEEEE;
}

.ayarlar img {

	height: 200px;
	width: 200pX;
	border:5px solid #f1f1f1;
	border-radius: 4px;

}

.resim_yükle {

		background-color: #0099cc;
		border: none;
		color: white;
		width:200px;
		height:40px;
		line-height:40px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		
		font-size:12px;
		cursor: pointer; 
		margin-bottom-top:14px;

}

.profile_bak{

		
		background-color: #0099cc;
		border: none;
		color: white;
		width:200px;
		height:40px;
		line-height:40px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		
		font-size:12px;
		cursor: pointer; 

}

.ayarlar input[type=text]{
	
		height:30px;
		width: 300px;
		border-radius: 5px;
		margin-top:20px;

		text-align:left;
		



}
.ayarlar input[type=email]{
	
		height:30px;
		width: 300px;
		border-radius: 5px;
		margin-top:20px;

		text-align:left;
		



}

.ayarlar input[type=password]{
	
		height:30px;
		width: 300px;
		border-radius: 5px;
		margin-top:20px;
		font-size: 20px;
		text-align:left;
		



}


.ayarlar input[type=submit]{

		background-color: #0099cc;
		border: none;
		color: white;
		width:300px;
		height:40px;
		line-height:40px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		
		font-size:12px;
		cursor: pointer; 
		margin-top:20px;
		
}
.ayarlar p{


font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; 
font-size: 15px; 
line-height: 200%; 
margin-top: 5px; 
margin-bottom: 5px; 
color:	#696969;



}


</style>

</head>


<body>
	@section("icerik")
			<div class="icerik">
				{{--PROFİL SAYFASI sadece profil gözükür ayarlar değil--}}
				@if(isset($anasayfa))
					<div class="bilgiler">
						
						<table>
							<tr>
								<th colspan="2" align="center"> <image img src="/system_img/profil.jpg"> </image></th> 
								
							</tr>
							
							<tr>
								<td colspan="2" align="center">  <font style="color:#696969; font-size:40px;"><b> {{$isim}}</b></font> <hr></td>
							</tr>
							
							<tr>
								<td align="center"><font style="color:#696969; font-size:25px;"><b> Kelimeler</b></font></td> <td align="center"> <font style="color:#696969; font-size:25px;"><b> Kartlar</b></font></td>
							</tr>
							<tr>
								<td align="center"> {{$kelime_sayisi}}</td><td align="center"> {{$kart_sayisi}}</td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<a href="/profil/ayarlar"><div id="profili_düzenle_link" > profili düzenle </div> </a>
								</td>
							</tr>
						</table>
					</div>
				 @endif

				{{-- PROFİL AYARLARI BÖLÜMÜ (resim, kullanıcı adı ve mail değiştrime alanları)--}}
				 @if(isset($profil_ayarlari))
					<div class="ayarlar">
						<table >

								<tr>
									<td><font style="font-size:40px; font-weight:bolder; color:#696969; margin-right: 145px;">Ayarlar</font></td>
										<td>
										    <div class="ayarlar_sekmeler">
														
													
												<a href="/profil/ayarlar"><div class="sekme"> Profil</div></a>
												<a href="/profil/ayarlar/parola"><div class="sekme"> Parola</div></a>
												<a href="/profil/ayarlar/hesapsil"><div class="sekme"> Hesabı Sil</div></a>
															
											</div>
										</td>

								</tr>
						</table>

						<table>
							<tr> 
									<td>
										<table >
											{{Form::open(['url'=>'/profil/ayarlar','method'=>'post','file'=>'true'])}}
											{{csrf_field()}}
												<tr>
													<th colspan="2" align="center">
													 	<image img src="/system_img/profil.jpg"> </image>
													</th>
													
												</tr>
												<tr>
													<td align="center">
														<div class="resim_yükle"> Yeni resim yükle </div>
													</td>
												</tr>
												<tr>
													<td align="center">
														<a href="/profil"><div class="resim_yükle"> Profiline bak </div></a>
													</td>
												</tr>
										</table>
									</td>

									<td>
										<table >
												<tr>
													
													<th colspan="2" align="center">
														Profil Bilgileri <hr>
													</th>
												</tr>
												<tr>
													<td align="right">
														<font style="color:#C0C0C0;">kullanıcı adı:</font>
													</td>
													<td>
														{{-- eğer kullanıcı boş bırakıp güncelleme  yaparsa validation hatası gözüksün ama hiç bir işlem yapmadıysa eski ismi gözüksün ve validation hatası varsa borderi kırmızı olsun  --}}
														<input type="text" name="kullanici_adi" value=" @if(!($errors->first('kullanici_adi'))){{$kullanici_adi}}@endif", @if($errors->first('kullanici_adi')) style="border:2px solid red;" @endif)><br>
														@if($errors->first('kullanici_adi')) <font color="#cc0033">Bu alanı boş bırakamazsın </font>@endif 
														
													</td>
												</tr>

												<tr>
													<td align="right">
														<font style="color:#C0C0C0;">E-posta:</font>
													</td>
													<td>
														<input type="email" name="mail"  value=" @if(!($errors->first('mail'))){{$mail}}@endif", @if($errors->first('mail')) style="border:2px solid red;" @endif><br>
														@if($errors->first('mail')) <font color="#cc0033">Bu alanı boş bırakamazsın </font>@endif 
														
													</td>
												</tr>
	
												<tr>
													<td>
														
													</td>
													<td>
														{{Form::submit('Kaydet')}}
														{{Form::close()}}
														@if(Session::has('basarili_islem'))
															<script>alert('Profil bilgileriniz güncellenmiştir');</script> 
														@endif
													</td>
										
												</tr>

										</table>
									</td>

							</tr>
						</table>

					</div>
				 @endif

					{{-- PAROLA AYARLARI BÖLÜMÜ--}}
				 @if(isset($parola_ayarlari))
					<div class="ayarlar">
								<div class="ayarlar">
									<table >

											<tr>
												<td><font style="font-size:40px; font-weight:bolder; color:#696969; margin-right: 145px;">Ayarlar</font></td>
												<td>
													<div class="ayarlar_sekmeler">
														
													
														<a href="/profil/ayarlar"><div class="sekme"> Profil</div></a>
														<a href="/profil/ayarlar/parola"><div class="sekme"> Parola</div></a>
														<a href="/profil/ayarlar/hesapsil"><div class="sekme"> Hesabı Sil</div></a>
															
													</div>
												</td>

											</tr>
										</table>
										{{Form::open(['url'=>'/profil/ayarlar/parola','action'=>'post'])}}
										<table>
											<tr>
												
											<th></th><th align="center">Şifreyi Değiştir <hr></th>

											</tr>
												
												<tr>
													<td align="right">
														<font style="color:#C0C0C0;">Mevcut parola:</font>
													</td>
													<td>																{{--validation hatası varsa border kırmızı olsun--}}
															<input type="password" name="eski" value="{{ old('eski') }}",@if(Session::has('parola_error')||$errors->first('eski')) style="border:2px solid red" @endif>
															<br>@if(Session::has('parola_error'))<font style="color:#A9A9A9">Girmiş olduğunuz parola yanlış</font> @endif
															
													</td>
												</tr>
												<tr>
													<td align="right">
														<font style="color:#C0C0C0;">Yeni parola:</font>
													</td>
													<td>
														<input type="password" name="yeni" value="{{ old('yeni') }}",@if($errors->first('yeni')) style="border:2px solid red" @endif>
														
													</td>
												</tr>
												<tr>
													<td>
														
													</td>
													<td align="left">
													
														<font style="color:	#A9A9A9">Parolanazı en az 6 karakterden oluşmalı</font>

													</td>
												</tr>
												<tr>
													<td align="right">
														<font style="color:#C0C0C0;">Onay:</font>
													</td>
													<td>
														<input type="password" name="tekrar" value="{{ old('tekrar') }}",@if($errors->first('tekrar')) style="border:2px solid red" @endif>
														
													</td>
												</tr>	
												<tr>
													<td></td>
													<td>
														{{Form::submit('Güncelle')}}
														{{Form::close()}}														
														@if(Session::has('islem_basarili'))	{{-- şifre Güncelleme işlemi doğru yapıldıysa alert göster--}}										
    
															<script>alert('Şifreniz başarılı bir şekilde değiştirilmiştir');</script> 
														@endif
													</td>
												</tr>

												<tr>
													<td>
														
													</td>
													<td align="center" colspan="2">
														<br><br>
														<font style="color:	#A9A9A9; text-decoration:none;">Şifreni mi unuttun ? <br> E-Posta adresine sıfırlama linki <a href="#/sifre/sifirla"  style="text-decoration:none; color:#0099cc;">gönder</a></font>

													</td>
												</tr>

										</table>
				 @endif

								{{-- HESAP SİLME BÖLÜMÜ--}}
				 @if(isset($sil))
				 	<div class="ayarlar">
						<table >

								<tr>
									<td><font style="font-size:40px; font-weight:bolder; color:#696969; margin-right: 145px;">Ayarlar</font></td>
										<td>
										    <div class="ayarlar_sekmeler">
														
													
												<a href="/profil/ayarlar"><div class="sekme"> Profil</div></a>
												<a href="/profil/ayarlar/parola"><div class="sekme"> Parola</div></a>
												<a href="/profil/ayarlar/hesapsil"><div class="sekme"> Hesabı Sil</div></a>
															
											</div>
										</td>

								</tr>	
						</table>

						<table >
							{{Form::open(['url'=>'/profil/ayarlar/hesapsil','action'=>'post'])}}
									<tr>
										<th align="center">Hesabı sil <hr></th>

									</tr>
									<tr>
										<td width="300">
											<font>
												<p>En yüksek seviyede veri koruma seviyesi için, hesabını silmek bu hesapla ilişkili kimlik bilgisinin de silinmesini gerektirecek.<b>Bu işlem geri alınamaz.</b></p><br>
											</font>
										</td>
									</tr>
									<tr>
										<td>	
												 <font color="#969696">Hesabımı silmeyi onaylıyorum </font><br>
												{{ Form::checkbox('onay')}}

										</td>
									</tr>
									<tr>
										<td align="center" width="300">
									{{Form::submit('Hesabı Sİl')}}
									@if(Session::has('sil_error')) <br><font color="#cc0033"> Bu işlemi gerçekleştirmek için onay kutucuğunu işaretle</font>@endif
									{{Form::close()}}
								</td>
							</tr>
						</table>
			
				  </div>
				 @endif
			</div>
	@endsection
</body>
</html>