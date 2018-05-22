<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>uye</title>
	<link rel="stylesheet" href="">
</head>

<style type="text/css" media="screen">
body{


  font-family: Roboto, sans-serif; 
} 

 .linkler{
  position:relative;
  margin:auto;
  width:840px;
  height: 58px;

 
  }
  .link{

  float: left; /* ilk ikisi yan yana durmaları için */

  height: 56px;
  width: 168px;

  font-family: sans-serif;
  color:#969696;
  line-height: 56px;/* yazı için*/
  text-align: center;
  border-bottom:3px solid #ddd;
  border-top:#A52A2A solid;


  }
  a:hover .link{

    
        border-bottom:3px solid black;
        color:black;

  }

  
  
  #cikis{

    position: relative;
    margin-left:855px;

  }
  #cikis ul{

        position: absolute;
        
        list-style-type: none;
        margin:0px;
        padding: 0px;
      
  }

  #cikis ul li{

        
        width: 63.2px;
        text-align: left;
        line-height: 25px;
  }

   #cikis ul li ul{


  display:none;
  }
   #cikis ul li:hover ul{
         
          display: block;
  }
  #cikis ul li ul li:before{

  content:"";
  border-bottom: 10px solid #f1f1f1;
  border-top:10px solid transparent;
  border-right:8px solid transparent;
  border-left:8px solid transparent;
  position: absolute;
  top: -17px;
  left: 30%;
  

}

  #cikis ul li ul li{

  padding:10px 10px;
  background: #f1f1f1;
  
  margin-left:-10px;
  }



 
  #cikis a{

    text-decoration: none;
    color:  #696969;
  }
  #cikis a:hover{

    color:black;
  }


  .isim{


  text-align: center;
  border-top:3px solid #A52A2A;

  height: 56px;
  width: 56px;
  line-height: 56px;
  border-bottom:1px solid #fff;
  font-family: sans-serif;
  color:black;
   
  }
  
  .icerik{
	

	margin-top: 30px;
	width: 100%;
	min-height: 550px;

	
	

}
  /* end LİNK KISMI*/
  
</style>
<body>
	
	
                             {{-- LİNKS  --}}
  <div class='linkler'>


    <a href="/"><div class='link'><b>KELİME EKLE</b></div></a>
    <a href="/alistirma"><div class='link'> <b>ALIŞTIRMA</b></div> </a>
    <a href="/kelimelerim"><div class='link'><b>KELİMELERİM</b></div></a>
    <a href="/ceviri"><div class='link'><b>ÇEVİRMEN</b></div></a>
    <a href="/kartlar"><div class='link'><b>KARTLAR</b></div></a>
      
      

  <!--çıkış kısmı-->

    <div id="cikis">
       <ul> 
         <li> <div class="isim"><font color=" #708090 "> <b><a href="/profil"> {{Auth::user()->name }}</a></b></font></div>
            <ul> 
              <li><a href="/profil" >Profil</a><br>
                  <a href="/profil/ayarlar" >Ayarlar</a> <br>
                   <a href="/cikis" >Çıkış</a> <br>


              </li>

            </ul>
          </li>
        </ul> 
      </div>
    </div>
  
   
                                      {{-- end LİNKS --}}
	@yield('icerik')


	
	
</body>
</html>