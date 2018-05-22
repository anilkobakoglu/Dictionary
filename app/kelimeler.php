<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelimeler extends Model
{
    protected $table='kelimeler';

  


   		public function user(){

   			return $this->belongsTo('\App\user');
   		}


}
