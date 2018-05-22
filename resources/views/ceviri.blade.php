@extends('layouts.uye')
<!DOCTYPE html>
<html>

<head>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Kelime Havuzu</title>
		<link rel="stylesheet" href="">

<style>

 

/* ceviri kısmı düzenlenmesi */

.ceviri_kismi table{


	margin: auto;
	margin-top:30px;
	border-collapse: collapse;
	 width: 70%;
}


.ceviri_kismi input[type=text]{

	margin-top: 15px;
	height: 120px;
	width: 600px;
	font-size: 18px;
	border: 2px solid #eee;
	
 
	
}
.ceviri_kismi input[type=button]{
	margin-top: 15px;
	outline: none;
	background-color:#0099cc;
	color:white;
	width: 95px;
	text-align: center;
	height: 35px;
	line-height: 35px;
	border: none;
	
	font-size: 14px;
}
/* cevap kısmı düzenlenmesi */

.cevap{

 
	margin-top: 15px;
	height: 120px;
	width: 600px;
	background: #eee;
	text-align: left;
}

.dropdown{

	padding:5px;
}
.dropdown select{

	height: 40px;
	background-color: #eee;
	font-weight: bold;
	position: relative;
	
}

</style>   

<script>

function gonder() {

jQuery.ajax({

type: 'POST',//Bu kısım POST ve GET değerlerinden birini alabilir

url: '/ceviri/translate',//Verinin gönderileceği sayfa

 

data: $('#veri-formu').serialize(),

error:function(){ $('#yazdir').html("Bir hata algılandı."); }, //Hata veri

success: function(veri) { $('#yazdir').html(veri);} //Başarılı

});

}
 
</script>

</head>


<body>

@section('icerik')
 <div class='icerik'>{{--bunlar layouts dan gelecek--}}


 <div class="ceviri_kismi">
	
					<table> 
					<tr>  <td colspan="2" align="center">  <font style="color:#806e69; font-size:45px;"><b> Translate</b></font> <hr></td> </tr>
					
					<form id="veri-formu" method="post" >
						{{csrf_field()}}

									<tr align="center">
										 
										<td align="right"><div class="dropdown">{{ Form::select('ilkDil', ['tr' => 'Türkçe', 'en' => 'İngilizce',"de"=>"Almanca"])}}</div></td>
										<td align="left"><div class="dropdown">{{ Form::select('ikinciDil', ['tr' => 'Türkçe', 'en' => 'İngilizce',"de"=>"Almanca"])}}</div> </td> 
									</tr>
							

										<tr align="center">
													<td colspan="2">
														 <input type="text" name="metin" >
													 </td>
										</tr>

										<tr align="center">
													<td colspan="2">
														 <input type="button" name="tercüme et" value="Tercüme et" onclick="gonder()" >
													 </td>
										</tr>

								<!--<tr> <td> <input type="button" name="gonder"  onclick="gonder()"></td></tr> -->
										 
					</form>
				 
							<tr align="center">
								<td colspan="3"> 
											<div class="cevap">
																 <div id="yazdir"> </div>              
											</div>      
									</td>
						 </tr>
						


					</table>

 </div>
	

																					
 </body>



</div>
@endsection
 </html>