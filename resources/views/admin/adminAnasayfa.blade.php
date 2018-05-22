@extends('layouts.admin')

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>anasayfa</title>
	<link rel="stylesheet" href="">

	<style type="text/css" media="screen">
		
		.istatistik{
				position: absolute;
				margin-top:70px;
				width: 100%;


		}

		.istatistik table{
			margin: auto;
		
			
		}

		.istatistik th{
		
			text-align: center;
			color:#88bcca;

		}
		.istatistik td{
			background:none;
			
			padding: 25px;
			color:#979879;
			font-size: 30px;
			text-align: center;
		
			

		}

	


		.istatistik img{

			position: relative;
			width: 150px;
			height: 150px;
			border-radius: 75px;
			border:none;
			margin-left:25px;
		}


	</style>
</head>
<body>

	@section("icerik")
			

		<div id="icerik">
			
			<div class="istatistik">
				<table>
					<tr> <th> Üye sayısı</th><th> Kelime sayısı</th><th> Admin sayısı</th></tr>
					<tr>
						<td><a href="#"><img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-group-512.png"></a></td>
						<td><a href="#"><img src="https://vignette.wikia.nocookie.net/deviousmaids/images/a/a5/ABC_Logo.png/revision/latest?cb=20140216015239"></a></td>
						<td><a href="#"><img src="https://cdn0.iconfinder.com/data/icons/icostrike-characters/512/user_login-512.png"></a></td>
					</tr>
					<tr>
						
						<td> {{$kullanici_sayisi}} </td> <td> {{$kelime_sayisi}}</td> <td> {{$admin_sayisi}}</td>
					</tr>
					
				</table>
			</div>
			</div>
		</div>

		
	@endsection




	
</body>
</html>