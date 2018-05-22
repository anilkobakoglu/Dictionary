@extends('layouts.admin')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Üyeler</title>
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




	

	</style>
</head>
<body>
	
	@section('icerik')
		<div id="icerik">
			<form action="ara" method="post" accept-charset="utf-8">
				
			
			<input type="search"  placeholder="Ara"  placeholder="Ara">

			</form>
			
			<div class="kullanicilar">
			<table>
			<tr><th>İsim</th><th>Email</th><th>Kayıt Tarihi</th><th>Sil</th><th>Admin Yap</th></tr>
			@foreach($users as $user)
					<tr> 
						<td>{{$user->name}}</td>
						<td><a href="/admin/uyeler/{{$user->email}}">{{$user->email}}</a></td>
						<td>{{$user->created_at}}</td>
						<td> <a href="/admin/uyeler/sil/{{$user->email}}"><img src="https://vignette.wikia.nocookie.net/criminal-case-grimsborough/images/b/b1/Delete_Icon.png/revision/latest?cb=20141216101607"> </a></td>

						<td><a href="/admin/uyeler/adminyap/{{$user->email}}"> <img src="https://www.itsolution.com.sg/wp-content/uploads/2015/03/admin-icon-2.png"> </a></td>
						
			@endforeach
		
			 </table>
		
	
		<div class="pagination">{{ $users}}</div>
			
		

		
</div>
		@if(Session::Has('sil_msg'))
			
			 @php echo'<script type="text/javascript">alert("Silme İşlemi Başarı İle Gerçekleştirilmiştir!");</script>'; @endphp
		@endif
		@if(Session::Has('yetkilendirme_msg'))
			
			 @php echo'<script type="text/javascript">alert("Seçtiğiniz kullanıcı admin olarak değiştirildi!");</script>'; @endphp
		@endif
		</div>
	@endsection
</body>
</html>

