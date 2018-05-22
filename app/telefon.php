<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefon extends Model
{


    protected $table='telefon';

    protected $fillable = ['deneme','telNo'];

   	protected $data=['created_at','updated_at'];


   		public function deneme(){

   			return $this->belongsTo('\App\deneme');
   		}

}
