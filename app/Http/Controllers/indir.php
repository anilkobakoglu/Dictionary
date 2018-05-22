<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelimeler;
use App\User;
use Illuminate\Support\Facades\Auth;
class indir extends Controller
{
    public function indir(){

    	$user_id=\Auth::id();
		$kelimeler=kelimeler::where('users_id',$user_id)->get();


		return view('indir',compact('kelimeler'));

    }//end indir
}
