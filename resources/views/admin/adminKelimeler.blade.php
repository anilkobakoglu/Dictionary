@extends('layouts.admin')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kelimeler</title>
	<link rel="stylesheet" href="">

	<style type="text/css" media="screen">


	.kelimeler table{
		
		position: relative;
		top: 35px;
		margin: auto;
		

		}
	.kelimeler td{
		
		padding: 10px;
		
		}
	.kelimeler th{
		font-size: 16px;
		color:#969696;
		
		}
	.kelimeler input[name=kelimeAra]{

		outline: none;
		
		padding: 10px 6px;
		border:2px #969696 solid;
		text-align: left;
		font-size: 20px;
		width: 350px;
		height: 55px;
		
	}
	

	.kelimeler input[name=kelimeAraButton]{
	outline: none;
	background-color: #04dcfc;
	width: 90px;
	height: 40px;
	line-height: 45px;
	text-align: center;
	color:#fff;
		
	}
	.kelimeler input[name=kelimeAraButton]:hover{
	
	font-size: 16px;
		
	}
	

	.kelimeGoster{

		position: relative;
		padding: 10px 6px;
		border:2px #969696 solid;
		text-align: center;
		line-height:55px;
		font-size: 20px;
		width: 350px;
		height: 55px

		


	}
	
	.kelimeError{
		position: relative;
		line-height: 55px;
		margin: auto;
		color:#fd2a4d;
		text-align: left;
		font-size: 22px;

	}
	

	.ayrinti{
		position: relative;
		top: 40px;
		border-top:1px #e6dcdb solid;
		width: 100%;
		height: 80px;
		
	}
	.ayrinti table{
		
		margin:left;
	}
	.ayrinti th{
		
		text-align: left;
		color:#969696;
		width: 200px;
	
	}
	.ayrinti td{
		padding: 3px 3px;
		min-width:200px;
		text-align: left;


	}


	</style>

	

</head>
<body>
@section('icerik')
 <div id="icerik">
<!-- Kelime arama kutusunun gösterildiği kısım -->
<div class="kelimeler">
<form action="/admin/kelimeler/kelimeara" method="post">
	{{csrf_field()}}
	<table> 

		<tr> <th>Aramak istediğin kelimeyi alltaki kutuya yaz</th></tr>
		<tr> 
			<td  align="center"> <input type="text" name="kelimeAra" maxlength="100" required="required" value="{{ old('kelimeAra') }}"></td>
			<td> <!-- arma kutusu yanına div ile başka bir bölme daha açıyorum -->
				<div class="kelimeGoster">

					@if(Session()->has('kelimeYok_msg'))

								<div class="kelimeError">*Aradığınız kelime yok </div>
					@endif

					@if(Session()->has('cevap_msg'))

								<div class="cevap">{{Session()->get('cevap_msg')}}</div>
						
					@endif
				</div>
			</td>

		</tr>

		<tr> <td align="center" colspan="2"> <input type="submit" name="kelimeAraButton" value="Ara"></td></tr>


	</table>
</form>
</div>
<!-- aytıntı kısmı -->
<div class="ayrinti">
	<table> 

	<tr> 

	<th>tarih</th>
	<th>kimden</th>
	<th>açıklama</th>
	<th>yan anlamları</th>
	
	</tr>
	<tr>
		<td>
			@if(Session()->has('tarih'))
			{{Session()->get('tarih')}}
			@endif
		</td>
		<td>

			@if(Session()->has('kullaniciAdi'))
			{{Session()->get('kullaniciAdi')}}
			@endif <br>
			@if(Session()->has('kullaniciMail'))
			{{Session()->get('kullaniciMail')}}
			@endif
		</td>
		<td>
			@if(Session()->has('aciklama'))
			{{Session()->get('aciklama')}}
			@endif

		</td>
		<td>
			@if(Session()->has('yanAnlam'))
			{{Session()->get('yanAnlam')}}
			@endif

		</td>
	</tr>
</table>
</div>





		

 </div>	
@endsection		
</body>
</html>

