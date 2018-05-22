  @extends('layouts.uye')
  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Kelime Havuzu</title>
      <link rel="stylesheet" href="">

  <style>
 

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



  .kartlar_kismi table{


    margin: auto;
    margin-top:30px;
   
   
  }


  ul.pagination {
    margin-top: 40px;
    background:#eee;
    padding: 5px 10px;
    border-radius: 30px;
    text-align:center;
    box-shadow: 0px 4px 20px black;
    max-width: 600px;
  }
  ul.pagination li {  
      display: inline-block;

      width:30px;
      height: 30px;
      margin:3px;
      padding: 5px;
      background:#ddd;
      line-height:30px;
      color:black;
      border-radius: 30px;
      box-shadow: 0px 4px 10px black;

      
      
  }
  ul.pagination li.active{

    transition: 1s;
    background:#0099cc;
    border-radius: 30px;
    color: white;


  }

  ul.pagination li:hover:not(.active){


    background-color:#0099cc;
    opacity: 0.5;
    transition:0.3s;
    box-shadow:none;
  }
  ul.pagination li:nth-child(1){
  opacity: 1;
  border:1px solid black;
  background:#ddd;

  }

  ul.pagination li:nth-last-child(1){
  opacity: 1;
  border:1px solid black;
  background:#ddd;

  }



  ul.pagination li a {



    text-decoration:none;

    color:black;
  }







  .kart img {

    
    height: 160px;
    width: 150px;
   

    border:4px solid #ddd;
    border-bottom:none;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;



  }




  .ceviri{
      font-family: initial;
      height: 30px;
      width: 150px;
      border: 4px solid #0099cc;
      background: #0099cc;
      color:white;
      line-height: 30px;
      font-size: 18px;
      text-align: center;
      
    }



.kart_ekle{

   
    height: 160px;
    width: 150px;
   margin-top: -17px;
    border:4px solid #ddd;
    border-bottom:none;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    text-align: center;
    font-size: 22px;
    font-family: monospace;
    color:#0099cc;
    
    

}
.kart_ekle img{
  margin-top:2px;
  margin-left: 5px; 
  height: 100px;
    width: 100px;
}

.kart_ekle input[type=file]{

  position: absolute;
  margin-left:-125px;
  height: 100px;
  width: 150px;
  opacity: 0;




}

.kart_ekle input[type=text]{
  
  outline: none;
  height: 25px;
  border:1px solid #0099cc;
  border-right: none;
  border-left: none;
  border-top:none;
  width: 148px;


}

  .kart_ekle_submit input[type=submit]{
    font-family: initial;
    margin-top: 3px;
    height: 40px;
    width: 150px;
    border: 4px solid #0099cc;
    background: #0099cc;
    color:white;
    line-height: 30px;
    font-size: 18px;
    text-align: center;
  }

#hatalar{
    
    
    margin:auto;
    margin-top:25px;
    border-radius: 15px;
    text-align: center;
    background: #d22d37;
    color:white;
    max-width: 600px;
    overflow:hidden;


    
    }

.update a{

  text-decoration: none;
  color:#0099cc;
  font-size: 13px;
  font-family: monospace;

}









  /* end ALIŞTIRMA KISMI */
  </style>   

   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
     
   <script type="text/javascript">
       setTimeout(function() { $('#hatalar').hide("slow"); }, 3000); /*1000 milisaniye = 1 saniye*/
   </script> 

</head> 
<body>
  
@section('icerik')
  <div class='icerik'>{{--bunlar layouts dan gelecek--}}
  @if(isset($kart_yok))<!-- kullanıcı bir kart oluşturmamaışsa aşağıdakileri yapar, ilk kayıt olan kullanıcılar için şart-->

    <div class="hatalar">Daha önce hazırlanmış bir kartınız mevcut değildir <br> Şimdi yeni bir kart oluşturabilirsin</div>

    <table  align="center">
          <tr>  <td colspan="6" align="center">  <font style="color:#806e69; font-size:45px;"><b> Kartlar</b></font><hr><br><br></td> </tr>
          <tr>
            <td>
              {{Form::open(['url'=>'/kartekle','file'=>'true','enctype'=>'multipart/form-data'])}}
              {{csrf_field()}}
                     <td align="center">
                          <div class="kart_ekle">

                            <input type="text"  name="turkce" style="color:#697c7d;" value="Türkçe" onfocus="if(this.beenchanged!=true){ this.value = ''}" onblur="if(this.beenchanged!=true) { this.value='Türkçe' }" onchange="this.beenchanged = true;" />{{--tıklandığında silininen value--}}
                        
                            <input type="text"  name="ingilizce" style="color:#697c7d;" value="İngilizce" onfocus="if(this.beenchanged!=true){ this.value = ''}" onblur="if(this.beenchanged!=true) { this.value='İngilizce' }" onchange="this.beenchanged = true;" /> 
                                <image img src="/kartlar_img/yeni_kart.png"> </image>
                                {{Form::file('resim')}}
                            </div>
                            <div class="kart_ekle_submit">
                              {{Form::submit('Kaydet')}}
                              {{Form::close()}}
                            
                          </div>
                       
                  </td>
              </tr>
        </table>

  @endif


  @if(!isset($kart_yok))<!-- kullanıcı bir kart oluşturmuşsa aşağıdakileri yap -->
  <div class="kartlar_kismi">

   <table align="center">
    <tr>  <td colspan="6" align="center">  <font style="color:#806e69; font-size:45px;"><b> Kartlar</b></font> <hr></td> </tr>
    <tr> <td> Toplam {{$kartlar->total()}} kart</td><td></td></tr>

    <tr>{{--tr yi foreach dışına yazarak sürekli satır eklemesini engelliyoruz--}}
          
          @foreach($kartlar as $row){{--kartların göründüğü kısım--}}
             
             <td align="center">

              <div class="kart"><img src="/kartlar_img/{{$row->kart_isim}}" alt="deneme"></div> 
              <div class="ceviri">{{$row->ingilizce}}</div>
              <div class="update"> <a href="/kartlar/sil/{{$row->ingilizce}}">Sil</a> | <a href="#">Güncelle</a></div>

             </td> 
             
            
          @endforeach  
              {{Form::open(['url'=>'/kartekle','file'=>'true','enctype'=>'multipart/form-data'])}}
              {{csrf_field()}}
               <td align="center">
                    <div class="kart_ekle">       
                         <input type="text"  name="turkce" style="color:#697c7d;" value="Türkçe" onfocus="if(this.beenchanged!=true){ this.value = ''}" onblur="if(this.beenchanged!=true) { this.value='Türkçe' }" onchange="this.beenchanged = true;" /> 
                        
                          <input type="text"  name="ingilizce" style="color:#697c7d;" value="İngilizce" onfocus="if(this.beenchanged!=true){ this.value = ''}" onblur="if(this.beenchanged!=true) { this.value='İngilizce' }" onchange="this.beenchanged = true;" /> 
                              <image img src="/kartlar_img/yeni_kart.png"> </image>
                              {{Form::file('resim')}}
                      </div>
                      <div class="kart_ekle_submit">
                        {{Form::submit('Kaydet')}}
                        {{Form::close()}}
                      
                    </div>
                 
               </td>
       </tr>
      {{--validation ve diğer hatalar bu div içerisinde gösterilecek--}}
      @if(Session::has('ayni_kart_hatasi'))<tr><td colspan="6"><div id="hatalar">{{Session::get('ayni_kart_hatasi')}} <br>Bu kelime ile daha önce kart oluşturulmuştur.</div></td> </tr>@endif
      {{--end hatalar--}}
     <tr>
                           
      <td align="center" colspan="6"><div class=" pagination">{{$kartlar}}</div></td>
    </tr>
 
  </table> 
  </div><!-- end kartlar_kismi  -->
  @endif


  {{--alert ile ekleme silme işlemlerinde başarı mesajı verme bölümü--}}
  @if(Session::has('silme_islemi'))

        <script>alert('Silme işlemi başarı ile gerçekleştirilmiştir');</script>
  @endif

</div>
@endsection
</body>
</html>