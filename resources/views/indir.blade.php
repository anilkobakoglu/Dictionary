<?php 


header('Content-type: text/html');
header('Content-disposition:attachment;filename=kelimelerim.html');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>İNDİR</title>
 	<link rel="stylesheet" href="">
 </head>
 <table border=1 align="center" style="margin-top:50px;">
 	<th>#</th> <th>İngilizce</th><th>türkçe</th><th>yan anlam</th> <th> açıklama</th> <th> tarih</th>
 <body>
@php $sayac=1; @endphp
 	@foreach($kelimeler as $row)


<tr><td>{{$sayac++}}</td><td>{{ $row->enKelime}}</td><td> {{$row->trKelime}}</td> <td>{{$row->yanAnlam}} </td> <td>{{$row->aciklama}} </td><td>{{$row->created_at}}</td></tr>

@endforeach	


</table>
 	
 </body>
 </html>


	


