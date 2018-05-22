<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>404</title>
	<link rel="stylesheet" href="">
</head>
<style type="text/css" media="screen">
	body{

		background: #cecece;
	}

 #top{
	position: relative;
	margin: 150px auto;
	background: -webkit-linear-gradient(top,#CC563C,#8E0502);
	height: 300px;
	width: 300px;
	

	border-radius: 150px;

	animation: animasyon 2s infinite;  /*4. adım  animationdan sonra alltaki ismi yazıyoruz 1s ile hızını belirliyoruz infinite sonsuz demek bunu sonsuz tekrarlar*/
	animation-direction: alternate;
	transition: all 2s;


 }
 #top h1{
 	 
 	 	
 	text-align: center;
 	font-weight: bold;
 
 	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	color:white;
	
	font-size: 80px;
	
	text-shadow: 5px 5px 15px black;

 }
  #top h2{
  	
 	text-align: center;
 	font-size: 20px;
 	font-weight: bold;
 	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	color:#ddd;

	text-shadow: 5px 5px 15px black;

 }


@keyframes animasyon{


	from{
		-webkit-box-shadow: 0 0 180px 150px white;
		
	}

	to{
	-webkit-box-shadow: 0 0 110px 110px white;
	}
}
</style>
<body>
	<div id="top">
		<h1>4 0 4 </h1>
	    <h2> Sayfa Bulunamadı</h2>
	</div>
</body>
</html>