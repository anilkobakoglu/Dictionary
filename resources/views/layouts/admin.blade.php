<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>anasayfa</title>
	<link rel="stylesheet" href="">
</head>

<style type="text/css" media="screen">
		* {
	font-family: Roboto, sans-serif; 
	margin: 0;
	border: 0;
	padding: 0;
}

body {
	background: #f1f1f1;
}

#top{
		position: absolute;
		position: fixed;
		background: white;
		width: 100%;
		height: 75px;
		border-bottom: 0.1px solid #ddd
		

}
#top .isim{

	position: absolute;
	font-size: 45px;
	color:#969696;
	font-weight: bolder;
	font-family: monospace;
	left: 595px;
}

#icerik{
	
	position: absolute;
	left: 250px;
	top: 85px;
	min-width: 1000px;
	min-height: 550px;
	border: 1px solid #ddd;	
	background: white

}
#sidebar{

	position: absolute;
	position: fixed;
	background:white;
	margin-top: 85px;
	width: 200px;
	height: 550px;

	border: 1px solid #ddd;	
	border-radius: 4px;
	color:black;
}

#sidebar td{
width: 200px;

}

#sidebar>ul{

		position: relative;
		padding: 0 15px;
		top: 25px;
		transition: all 1s;
}




#sidebar>ul>li:nth-child(1){
	position: relative;
	margin-top: 25px;

	padding: 15px;
	list-style-type: none;
	font-size: 18px;

	border-left: 3px solid #fd8902;
	transition: all 0.3s;

}
#sidebar>ul>li:nth-child(1):hover{

	border-left: 8px solid #fd8902;
	

}
#sidebar>ul>li:nth-child(2){
	position: relative;
	margin-top: 15px;
	padding: 15px;
	list-style-type: none;
	font-size: 18px;
	border-left: 3px solid #7304fb;
	transition: all 0.3s;


}
#sidebar>ul>li:nth-child(2):hover{

	border-left: 8px solid #7304fb;

}
#sidebar>ul>li:nth-child(3){
	position: relative;
	margin-top: 15px;
	padding: 15px;
	list-style-type: none;
	font-size: 18px;
	border-left: 3px solid #5f8d27;
	transition: all 0.3s;
	

}
#sidebar>ul>li:nth-child(3):hover{

	border-left: 8px solid #5f8d27;

}

#sidebar>ul>li> a{

display: block;
text-decoration: none;
font-family: Roboto, sans-serif; 
color:#969696;

}
#sidebar>ul>li> a:hover{

color:#646261;



}

#sidebar  img{
position: relative;
border:none;
left: 19px;
width: 150px;
height: 150px;
}




</style>
<body>
	@yield('icerik')
	<div id="sidebar">
		<table>
			
						<tr> <td><img src="https://www.easeofdoingbusinessinassam.in/homepage/imgs/create-profile.png"></td></tr>
						<tr><td align="center" style="color:#383a3a;"> {{Auth::user()->name}}</td></tr>
		</table>

				<ul>
					<li><a href="/admin/uyeler">Üyeler</a></li>
					<li><a href="/admin/kelimeler">Kelimeler</a></li>
					<li><a href="/admin/adminler">Adminler</a></li>
				</ul>

		</div>


		<div id="top">
			<div class="isim"> ADMİN PANELİ </div>
		</div>

	@endYield("icerik")
			
	
</body>
</html>