@extends('layouts.uye')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelime havuzu</title>
    <link rel="stylesheet" href="">

<style>




/* ALIŞTIRMA KISMI */
.kelimelerim_kismi{

margin:auto;
margin-top:30px;
overflow:hidden;
width: 80%;
border:none;

}
/* end ALIŞTIRMA KISMI */

/* PAGİNATİON */





ul.pagination li {

    display: inline;
}

ul.pagination li a {
    color: black;

    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

ul.pagination li a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

ul.pagination li a:hover:not(.active) {

background-color:  #a8d2e4  ;}



#kelimeler {
    position:relative; 
    border-collapse: collapse;
    width: 95%;
   

 
    
      
}

#kelimeler td {
     
    text-align: center;
    width:150px;
    padding: 7px;
    max-width: 100px;
    
}

#kelimeler td a{
  text-decoration: none;
  color:black;
 

}


#kelimeler tr:nth-child(even){background-color: #f2f2f2;}

#kelimeler td:hover {
    background-color: #ddd;
   

}

#kelimeler a{

    display: block;
}


#kelimeler th {
  
    padding: 7px;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color:   #0099cc;
    color: white;
 
}


/* ayrıntılı kelime vs gösterirken oluşacak tablo*/

#kelimelerayrinti {
    
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 95%;
    
}

#kelimelerayrinti td {
    text-align: center;
    border-top: 2px solid black;
   
   overflow: hidden;
   
    max-width: 80px;

   

}

#kelimelerayrinti a{

    display: block;
}


#kelimelerayrinti th {
  
    padding: 7px;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    color: black;
 
}

.kelimesayisi{
    
    border-radius: 200px;
    height: 30px;
    width: 30px;    
    text-align: center;
    line-height: 30px;
    background: orange;
    color:white;
    margin:auto;
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

.basarili_islem{

    margin:auto;
    margin-top:25px;
    border-radius: 15px;
    text-align: center;
    background: #80ef68;
    color:white;overflow:hidden;
    width:430px;
    

}

input[type=text]{ 
    
    padding: 6px 16px;
    font-weight: bolder;
    text-align: center;
    text-decoration: none;
    display: inline-block;
   width: 140px;
    cursor: pointer;
    outline: none;

}

input[type=submit]{
    background-color: #6fc6f8;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    outline: none;
}
.search{
    
    height: 40px;
    line-height: 40px;
    background: #0099cc;
    width: 220px;
    border-radius:2px;
    margin-left: 99px;
    margin-bottom: -9px;
  

}

input[name=search] {
margin-left: 5px;
color:black;

padding: 6px 14px;
border:1px #0099cc solid;
outline: none;



} 
input[name=search_button] {
background: #0099cc;
margin-left: -5px;
width: 5px;
height: 10px;
padding: 11px 30px 20px 8px;
color:white;

line-height: 10px;
outline-style: none;



} 
input[name=search_button]:hover {
color:#ddd;

} 




 


.guncellekismi{
    

    background: #eee;
    border: 1px solid #ddd;
    width: 95%;

    text-align: center;
    
   

}

.kelimeayrinti{
    
    left: 30px;
   

    text-align: center;
    overflow: hidden;
    
}
.paginate{
 width: 95%;
 text-align: center;

}


</style>


<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>

  
</head>
<body>
    @section('icerik')
        <div class='icerik'>{{--bunlar layouts dan gelecek içerik kısmı genel bşr çerçeve banner harici içeriklerinin genel çerçevesi--}}
                                       {{-- KELİMELER --}}
    
            <div class="kelimelerim_kismi"> <!--tablo bu div içerisnde şekillenecek-->  

                    @if(!empty($hata)) <!-- Kullacının havuzu boşmu, kelimesi varmı yokmu diye bakıyorum hatadan kastım o -->
                        <div class="hatalar">
                            {{$hata}}
                    </div>

                    @endif
           
             <ul class="pagination" >
            

           

@if(isset($kelimeler))<!-- kullanıcın kelimesi varsa -->



    <table id="kelimeler" >
        <tr><td align="center" colspan="6" style="background:none; height: 40px;"> <font style="color:#806e69; font-size:45px;"><b>Sözlüğüm</b></font> </td></tr> 

        <tr  style="background:none;"> 
            <td style="background:none;"> <a href="/kelimelerim/indir"> Kelimeleri İndir</a></td>
            <td style="background:none;"></td ><td style="background:none;"></td><td style="background:none;"></td>
            <td colspan="2" style="background:none;">
                        <!-- arama kutusu-->
                            <div class="search">

                                {{csrf_field()}}
                                   <form action="/kelimeara" method="post" >
                                      {{csrf_field()}}

                                      <input type="text"  name="search" style="color:#697c7d;" value="Kelime Ara" onfocus="if(this.beenchanged!=true){ this.value = ''}" onblur="if(this.beenchanged!=true) { this.value='Kelime Ara' }" onchange="this.beenchanged = true;" /> 


                                      <input type="submit" name="search_button" value='Ara'> 
                                      
                                 </form>
                             </div> 

                            <!-- end arama kutusu-->
           </td>

       </tr>
             

         <tr>
            <th> <div class="kelimesayisi" align="center"> {{$kelimeler->total()}}</div></th>
            <th> Tarih </th>
            <th> İngilizce </th> 
            <th> Türkçe </th>
            <th> Güncelle</th>
            <th> Sil</th>
         </tr>

                    @php  $sayac=1; @endphp <!-- tablonun en solunda numaralandırma için-->

        @foreach ($kelimeler as $kelime) 

            <tr>

              <td style="width: 25px;"> {{$sayac++}}</td>
              <td>  <li> @php echo (explode(" ", $kelime->created_at)[0]); @endphp</li></td> {{-- saat,dk,sn vardı tarihi explode ettik --}}
              <td>  <a href="/ayrintiligoster/{{ $kelime->enKelime }}" title="ayrıntrı için tıkla"> <li> {{ $kelime->enKelime }} </li>  </a></td>
              <td>  <a href="/ayrintiligoster/{{ $kelime->enKelime }}" title="ayrıntrı için tıkla"> <li>  {{$kelime->trKelime}}  </li> </td>
              
                        <!-- aynı tr içerisinde ki td leri(sil ve güncelle bunlara link veriyorum  sil işlemi için sadece ingilizce kelime çünkü o kullanıcıya ait her ingilizce kelimesinden bir tane var 
                        güncelle içinde iki parametre gönderiyorum örneğin güncelle/book/kitap bunları urlden çekiyorum ve inputtakiler ile değiştiriyorum.
                        )-->
              <td><a href='kelimeguncelle/{{ $kelime->enKelime }}/{{ $kelime->trKelime }}'> <img src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-8/512/Refresh-icon.png" height="25" width="25px"></a></td>
              <td><a href='kelimesil/{{ $kelime->enKelime }}'>  <img src="http://vignette3.wikia.nocookie.net/criminal-case-grimsborough/images/b/b1/Delete_Icon.png/revision/latest?cb=20141216101607" height="25" width="25px"></a></td> 

             
            </tr> 

        @endforeach

    </table>

     <br>
     <br>
    
    <div class="paginate">{{$kelimeler}}</div> <!-- relationship için yazılması gerekiyor -->

    <br>


         
     <!-- Güncelleme yapılmak istendiyse relationun altına div açılacak--> 
      

            @if(Session::has('enKelime'))
                 <table id="kelimelerayrinti"> 
                    <tr><th>İngilizce</th><th>Türkçe</th><th>Yan anlam</th><th>Açıklama</th><th> </th><th> </th></tr>
                      <form action="kelimeguncelle/{{Session::Get('enKelime')}}/{{Session::Get('trKelime')}}" method="post">

                            {{csrf_field()}}
                           <tr>
                            <td>{{ Form::text('enKelime',Session::Get('enKelime'))}}</td>
                            <td> {{ Form::text('trKelime',Session::Get('trKelime'))}}</td>
                            <td>{{ Form::text('yanAnlam',Session::Get('yanAnlam'))}}</td>
                            <td> {{ Form::text('aciklama',Session::Get('aciklama'))}}</td>

                           
                            <td></td><td></td>
                            <td>{{Form::submit('Güncelle')}}</td>
                        </tr>
                      </form>
                </table>    
                    
            @endif

     <!-- Kelimeleri ayrıntılı görüntüleme için relationun altına div açılacak-->

            @if(Session::has('ayrinti_en')) <!-- sadece ayrinti_en var mı diye baktım bu varsa diğerlerinide controllerde gönderdim-->

                <div class="kelimeayrinti">

                    <table id="kelimelerayrinti"> 

                        <tr> <th> İngilizce </th ><th>Türkçe</th> <th>Yan Anlamı </th> <th> Açıklama</th><th> Güncelle</th> <th> Sİl </th></tr>

                        <tr>
                            <td>  {{Session::Get('ayrinti_en')}} </td>
                            <td>  {{Session::Get('ayrinti_tr')}} </td> 
                            <td>  {{Session::Get('ayrinti_yan')}} </td>
                            <td>  {{Session::Get('ayrinti_aciklama')}}</td>
                            <td><a href="kelimeguncelle/{{Session::Get('ayrinti_en')}}/{{Session::Get('ayrinti_tr')}}"> <img src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-8/512/Refresh-icon.png" height="25" width="25px"></a></td>
                            <td><a href="kelimesil/{{Session::Get('ayrinti_en')}}">  <img src="http://vignette3.wikia.nocookie.net/criminal-case-grimsborough/images/b/b1/Delete_Icon.png/revision/latest?cb=20141216101607" height="25" width="25px"></a></td> 
                        </tr>

                        </div>
                    </table>
             @endif

     <!-- seach yapıldıtldıktan sonr kelimeleri ayrıntılı gösterme bölümü relationun altına div açılacak-->

             @if(Session::has('search_kelime')) 
                     <div class="kelimeayrinti">

                        <table id="kelimelerayrinti">

                              <tr> <th> İngilizce </th ><th>Türkçe</th> <th>Yan Anlamı </th> <th> Açıklama</th> <th> Güncelle</th> <th> Sİl </th></tr>

                                    @php $search_kelime=Session::Get('search_kelime') @endphp
                                        
                                    @foreach($search_kelime as $row)
                                        <tr>
                                            <td>{{$row->enKelime}}</td>
                                            <td>{{$row->trKelime}}</td>
                                            <td>{{$row->yanAnlam}}</td>
                                            <td>{{$row->aciklama}}</td>
                                           <td><a href='kelimeguncelle/{{ $row->enKelime }}/{{ $row->trKelime }}'> <img src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-8/512/Refresh-icon.png" height="25" width="25px"></a></td>
                                            <td><a href='kelimesil/{{ $row->enKelime }}'>  <img src="http://vignette3.wikia.nocookie.net/criminal-case-grimsborough/images/b/b1/Delete_Icon.png/revision/latest?cb=20141216101607" height="25" width="25px"></a></td> 
                                        </tr>    
                                    @endForeach
                
                        </table>
                    </div>
            @endif


     </div>
  </div> 
 @endif<!-- endif isset($kelime)-->  
     
  
                                        {{--end KELİMELER --}}  





                                        {{-- HATALAR --}}

@if($errors->any())

<div class="hatalar">
    {{$errors->first('enKelime')}} <br>
    {{$errors->first('trKelime')}}

</div>
@endif


<!-- silme işlemindeki hata-->
@if(Session::has('sil_error_msg'))
    <div class="hatalar">
        {{{Session::Get('sil_error_msg')}}}
    </div>

@endif


                                       {{-- end HATALAR --}}




                                       {{-- BAŞARILI MESAJLARI  --}}

<!-- başarrılı kelime silme-->
  @if(Session::has('sil_msg'))
    <div class="basarili_islem">
       
        <script>alert(' {{Session::Get('sil_msg')}}');</script>
    </div>

@endif

<!-- başarrılı güncelleme işlemi-->
  @if(Session::has('guncelle_msg'))
    <div class="basarili_islem">
       
        <script>alert('{{Session::Get('guncelle_msg')}}');</script>
    </div>

@endif
                                      

                                     {{-- end BAŞARILI MESAJLARI  --}}


@endsection
</div>
</body>
</html>