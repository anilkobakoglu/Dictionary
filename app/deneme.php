<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//bu sınıfı elle ekliyoruz(sublime text gibi editör kullanıyorsan)


class deneme extends Model
{
	 use SoftDeletes;	
    
    protected $table = 'deneme';
	
	protected $dates = ['deleted_at','created_at','updated_at']; // silme işlemlerinde bu sütun otomatik olarak tarih atayacak

	protected $fillable=['isim'];

	//protected $hidden = ['isim'];

	//protected $visible =['isim'];


	public function getisimAttribute($value){

		return ucFirst($value);


	}


	public function setisimAttribute($value){


		$this->attributes['İsim']=strToUpper($value);
	}



	public function telefon(){


		return $this->hasOne('\App\telefon');
	}


	 public function yorumlar(){


    	return $this->hasMany('\App\yorumlar'); // yorumları bu modele dail ediyoruz
    }
}
