@extends('layouts.uye')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelime Havuzu</title>
    <link rel="stylesheet" href="">

<style>
 
/* ALIŞTIRMA KISMI */
.alistirmaKismi{


margin:auto;
margin-top:30px;
overflow:hidden;
width: 80%;
border:none;

}




input[type=text]{ 

    border: 2px solid #6fc6f8;
    color: black;
    padding: 9px 23px;
    font-weight: bolder;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}

input[type=submit]{
    background-color: #0099cc;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}

input[type=image]{

    width: 5px;
    height: 5px;

}
select{


     background: transparent;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   
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

.basariliKelimeEkleme{

    margin:auto;
    margin-top:25px;
    border-radius: 15px;
    text-align: center;
    background: #80ef68;
    color:white;overflow:hidden;
    width:430px;
    

}

#kelimeler {
    margin:auto;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
     
}

#kelimeler td {

    text-align: center;
   
    padding: 5px;
   
}



#kelimeler a{

    display: block;
}






/* end ALIŞTIRMA KISMI */
</style>    
</head>


 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
     
   <script type="text/javascript">
       setTimeout(function() { $('#sure').hide(); }, 3000); /*1000 milisaniye = 1 saniye*/
 </script> 



<body>
  
 


                                            {{-- ALIŞTIRMA kelime gir kısmı--}}


    @section('icerik')
       <div class="icerik">
      
    
     <div class="alistirmaKismi">
        
           <table id="kelimeler"> 
              <form action="kelimeGir" method="post">
               
                 {{csrf_field()}}

                    <tr> <td colspan="4" align="center"> <font style="color:#806e69; font-size:45px;"><b> Sözlüğe kelime ekle </b></font><hr> <br><br></td></tr>
                       <tr> 
                            <th> ingilizce</th>
                            <th> Türkçe</th>
                            <th> Yan Anlamı</th>
                            <th> Açıklama</th>

                        </tr>


                        <tr>

                            <td>{{Form::text('ingilizce')}}</td>
                            <td>{{Form::text('turkce')}}</td>
                             <td>{{Form::text('yanAnlam')}}</td>
                            <td>{{Form::text('aciklama')}} </td>

                        </tr>

                         <tr>

                            <td colspan="4"> {{Form::submit('Kaydet')}} </td>
                          

                        </tr>

                      
                       
          

              </form>
            </table>
             
     </div>  
                                        {{--end ALIŞTIRMA --}}  




                                        {{-- HATALAR --}}


@if($errors->any())

<div class="hatalar">
    <ul style="list-style: none;">
    <li>{{$errors->first('ingilizce')}} </li> <!--validation hataları -->
    <li>{{$errors->first('turkce')}} </li>
    <li>{{$errors->first('aciklama')}}</li>
    </ul>

</div>
@endif

@if(Session::has('kaydet_error_msg')) <!--eğer daha önce böyle bir kayıt yaptıysa hata versin  -->
    <div class="hatalar" id="sure">
        {{{Session::Get('kaydet_error_msg')}}}
    </div>

@endif

                                        {{-- end HATALAR --}}



                                        {{-- KAYDET MESAJI --}}


@if(Session::has('kaydet_msg'))


<div class="basariliKelimeEkleme">
    
<script>alert('{{Session::Get('kaydet_msg')}}');</script> 
    
</div>

@endif

<!--
@if(isset($kelimeler))
    @foreach ($kelimeler as $kelime)
        {{ $kelime->enKelime }}  <br>      
    @endforeach
 {{$kelimeler}}
@endif 

  -->                              {{-- end KAYDET MESAJI --}}
</div>
 @endsection                               
</body>
</html>