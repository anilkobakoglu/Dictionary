@extends('layouts.uye')
<!DOCTYPE html>
<html>

<head>
	 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Kelime Havuzu</title>
		<link rel="stylesheet" href="">

<style>



/* ALIŞTIRMA KISMI */
.alistirmaKismi{

margin:auto;
margin-top:30px;
overflow:hidden;
width: 80%;
border:none;

}




input[type=text]{ 

		border: 2px solid   #696969;
		border-radius: 15px;
		color: black;
		

	 
		font-weight: bolder;
		text-align: left;
		text-decoration: none;
		display: inline-block;
		cursor: pointer;
		width: 300px;
		height: 50px;
		outline:none;
		font-size: 20px;
}


input[name=ingilizce]{

				 background-color: white;
				 border:none;
				 font-size: 25px;
				 color:#5e4c47;
				 font-weight: bold;
				 box-shadow: none;
				 outline: 0;



}
button{

		background-color: #0099cc;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		margin: 4px 2px;
		cursor: pointer; 
}


.hatalar{
		
		
		margin:auto;
		margin-top:25px;
		border-radius: 15px;
		text-align: center;
		background: #d22d37;
		color:white;
		width:430px;
		overflow:hidden;


		
		}


#kelimeler {
		margin:auto;
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		width: 95%;
	
 
}

#kelimeler td {
	
		padding: 5px;
				
				
}


#kelimeler a{

		display: block;
}



.cevapDiv{


		background:none;
		margin:auto;
		text-align: center;
		font-family: "Times New Roman", Times, serif;
		width: 525px;
		margin-top:5px;
		text-align: center;
		min-height: 84px;
		padding-top: 0px;
		font-size: 20px;
		color:#8B0000; 



}



/* end ALIŞTIRMA KISMI */

</style>



 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		 
	 <script type="text/javascript">
			 setTimeout(function() { $('#sure').hide(); }, 3000); /*1000 milisaniye = 1 saniye*/
 </script> 

</head>



<body>
	


																				


																						{{-- ALIŞTIRMA --}}

@section('icerik')
 <div class='icerik'>{{--bunlar layouts dan gelecek--}}
	<div class='alistirmaKismi'>
		<table id='kelimeler'>
						<tr>
								<td colspan="2" align="center">  <font style="color:#806e69; font-size:45px;"><b> Exercise</b></font> <hr></td> 

						</tr>

						<tr>
								 <td align="center"><image img src="/system_img/soru_isareti.png" style="height: 100px; width:100px; "></image>{{--resim--}}
												@if(isset($random))
													<form method="POST">
													<input type="submit" formaction="alistirma/{{$random}}" style="visibility: hidden; display: none;">
													{{csrf_field()}}
													<input type="hidden" name="ingilizce" value="{{$random}}"> <div  style="margin-left:0px;  "> <b style="font-size: 25px; color:#006600">{{$random}}</b></b>
												@endif
								</td>

					 </tr>
		 @if(isset($hata_msg))<!-- Hata varmı diye bakıyoruz hata ise kullanıcnın kelimesi var mı yok mu kelimesi yoksa alıştırma yapamaz ona göre blade düzenlendi-->
						 
						 <tr>
										<td colspan="2" align="center"> <font style="color:#806e69;"> Havuzunuzda hiç kelime olmadığı için alıştırma yapılamıyor.Lütfen kelime <a href="anasayfa">ekleyin<a/></font></td>  

						 </tr>
			 @else
						 <tr>
										<td colspan="2" align="center"> <font style="color:#806e69;"> Yukarıdaki <b>İngilizce </b> kelimenin <b> Türkçe</b> karşılığını alltaki kutucuğa yaz</font></td>  

						 </tr>
					 

						<tr>
								
								<td align="center" colspan="2"> <input type="text" name="turkce" maxlength="50"></td>
								
								
						</tr>

						

						<tr>
								

								<td colspan="2" align="center"> <button formaction="alistirma/{{$random}}">cevapla</button></td>

						</tr>
			 @endif  

				</form>
		</table>
</div><!--end alistirma kismi--> 
																					{{-- endALIŞTIRMA --}}


<div class="cevapDiv">

						@if(Session::Has('dogru_msg'))
						
					 
								 <div id="sure">  <b style="font-size: 28px; color:green"> {{Session::get('dogru_msg')}} </b>  Doğru Cevap</div>
								 
						
						@endif

						@if(Session::Has('yanlis_cevap'))
		 
								
									
										<div id="sure"> 
														<b style="font-size: 28px;"> {{Session::get('yanlis_cevap')}} </b>Yanlış cevap <br>
														Doğru cevap   <b style="font-size: 28px;">{{Session::get('dogru_cevap')}}</b> olmalıydı
										</div>
								
							 
					 

						@endif


						@if(Session::Has('yanAnlam'))
								
									 
												<div id="sure">
													

																<b style="font-size: 28px; color:orange;"> {{Session::get('yanAnlam')}}  </b>yan anlamlarında var  <br>
											 
												</div>
														 
						@endif
			</div>



</div>
@endsection                             
		</body>
</html>