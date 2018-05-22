
@extends('a.a')



@section('b')
        <div class="a">
            sd
        </div>
@endsection

@extends('banner.banner')

@section('banner')
<div class='linkler'>


  <a href="/"><div class='kelimegir'> <b>KELİME EKLE </b></div> </a>
  <a href="/alistirma"><div class='alistirma'> <b>ALIŞTIRMA </b> </div> </a>
  <a href="kelimelerim"><div class='kelimelerim'><b> KELİMELERİM </b></div></a>
    

<!--çıkış kısmı-->

  <div id="cikis">
     <ul> 
       <li> <div class="isim"><font color=" #708090 "> <b>{{Auth::user()->name }}</b></font></div>
          <ul> 
            <li><a href="cikis" >çıkış yap</a></li>
          </ul>
        </li>
      </ul> 
    </div>
  </div>
</div>
@endsection

