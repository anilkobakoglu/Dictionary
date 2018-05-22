@extends('layouts.admin')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Adminler</title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
	
ul.pagination li {

    display: inline-block;
}

ul.pagination li a {
    color: black;

    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

ul.pagination li a:click{


	background-color:red;
}

ul.pagination li a:hover:not(.active) {

background-color:  #969696;

}

 .kullanicilar table{

	
	position: relative;
	min-width:1000px;
	border-collapse: collapse;
	margin: auto;
	margin-bottom: 50px;
	top: 85px;
	

}

.kullanicilar tr:nth-child(even){
	
	background:  #f1f1f1;
}

.kullanicilar th{
	color: #707c7c;
	background: none;
	text-align: center;
	padding-bottom: 15px;
}

.kullanicilar td{

color:black;
padding: 8px 12px;
text-align: center;

}
.kullanicilar td a{

	text-decoration: none;
	color:black;
}

.kullanicilar td:hover{

	background: #96969665;
}

.kullanicilar td img{
height: 25px;
width: 25px;

}
.pagination{
	position: relative;
		left: 170px;
	margin-top: 100px;
	padding-bottom: 10px;
	
}

input[type=search]{

	position: absolute;
	background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 6px;
	outline:none;
	box-sizing: border-box;
	top: 35px;
	height: 40px;
	left: 5px;
	width: 90px;
	border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #d9d9d9;
    transition: all 0.5s;
    padding: 9px 10px 9px 32px;
    border-radius: 10px;



}

input::-webkit-search-cancel-button {
	display: none; 
}

    
input[type=search]:focus{
background-color: white;
	-webkit-box-shadow: 0 0 5px lightblue;
width: 180px;
}

#adminekleButon{
	position:absolute;
	background-color: #ddd;
	right: 45px;
	top:35px;
	width: 90px;
	height: 40px;
	line-height: 45px;
	border-radius: 5px;
	text-align: center;
	color:#736c6c;
	
}

#adminekleButon:hover{

	width: 93px;
	height: 43px;
}
#adminekleButon >a{
	
	color:#000;
	text-decoration: none;
	font-weight: 400;
}


#adminEkle {
	
	padding: 20px 0px;
	width:100%;
	border-bottom:1px green dashed;
	border-top:1px green dashed;
	overflow: hidden;
	background:#f1f1f1;

}

#adminEkle table{
margin:auto;

}
#adminEkle td{
padding: 7px 18px;

}
#adminEkle th{
color: #707c7c;
text-align: center;

}
#adminEkle input[type=text]{
outline:none;
border:2px solid #707c7c;
height: 35px;
border-radius: 5px;


}
#adminEkle input[type=password]{
outline:none;
font-weight: bolder;
border:2px solid #707c7c;
height: 35px;
border-radius: 5px;


}


#adminEkle input[type=submit]{


padding: 8px 8px;
background-color: #0099cc;
color:white;
font-size: 16px;
}

	</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 

$(document).ready(function () { 
$('#adminekleButon a').click(function () {

$('#adminEkle').slideToggle(); 
});
}); 
</script> 
</head> 



</head>
<body>
	<!-- UYE GOSTERME SAYFASI İLE AYNI KODLAR -->
	
	@section('icerik')
		<div id="icerik">
			<form action="ara" method="post" accept-charset="utf-8">
				
			
				<input type="search"  placeholder="Ara"  placeholder="Ara">

			</form>



			<div id="adminekleButon"> <a href="#">Admin ekle</a></div>
			
<!-- kullanıcıların görüntelecenği kısım -->	

	<div class="kullanicilar">

			<table>
				<tr><th>İsim</th><th>Email</th><th>Kayıt Tarihi</th><th>Sil</th><th>Kullanıcı yap</th></tr>
				@foreach($users as $user)
						<tr> 
							<td>{{$user->name}}</td>
							<td><a href="/admin/uyeler/{{$user->email}}">{{$user->email}}</a></td>
							<td>{{$user->created_at}}</td>
							<td> <a href="/admin/uyeler/sil/{{$user->email}}"><img src="https://vignette.wikia.nocookie.net/criminal-case-grimsborough/images/b/b1/Delete_Icon.png/revision/latest?cb=20141216101607"> </a></td>
							<td> <a href="/admin/uyeler/uyeyap/{{$user->email}}"> <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/User_icon-cp.png"></a> </td>
						</tr>
				@endforeach
		
			 </table>
		
		<div class="pagination">{{ $users}}</div>


</div>
<!-- END kullanıcıların görüntelecenği kısım -->

<div id="adminEkle">
  <table>
  	<form action="/admin/adminler/adminekle" method="post">
  	  	{{ csrf_field() }}
	  	<tr><th> İsim</th> <th> Mail</th> <th>Parola</th><th></th></tr>
	  	<tr> 
	  		<td><input type="text" name="isim" required="required"></td>
	  		<td><input type="text" name="mail" required="required"></td>
	  		<td><input type="password" name="parola" required="required"></td>
	  		<td><input type="submit" name="gonder" value="Kaydet"></td>
	   </tr>


	 	<tr> 
	 		<td colspan="3" align="center"> <label>@if($errors->any())  {{$errors->first()}}@endif</label>
	 		</td>
	   </tr>
	</form>
  </table>
</div>




	
		@if(Session::Has('sil_msg'))
			
			 @php echo'<script type="text/javascript">alert("Silme İşlemi Başarı İle Gerçekleştirilmiştir!");</script>'; @endphp
		@endif
		@if(Session::Has('uyeyap_msg'))
			
			 @php echo'<script type="text/javascript">alert("Sectiğiniz admin kullanıcı yapılmıştır.!");</script>'; @endphp
		@endif
	

</div>




	@endsection
</body>
</html>
