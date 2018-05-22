<?php

namespace App\Http\Controllers;

use App\User;
use App\kelimeler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class adminController extends Controller
{
    public function anasayfa(Request $request){
    	

    	$kullanici_sayisi=User::where('isAdmin',0)->get()->count();
    	$admin_sayisi=User::where('isAdmin',1)->get()->count();
    	$kelime_sayisi=kelimeler::get()->count();
   
    	return view('admin.adminAnasayfa',compact('kullanici_sayisi','admin_sayisi','kelime_sayisi'));
    }

    public function uyeGoster_GET(Request $request){
    	

    		$users=User::where('isAdmin',0)->paginate(30);

    		return view('admin.adminUyeGoster',compact('users'));

    }
    public function adminGoster_GET(Request $request){
        

            $users=User::where('isAdmin',1)->paginate(3);


            return view('admin.adminAdminGoster',compact('users'));

    }
    public function kelimeGoster_GET(Request $request){
        
        
            return view('admin.adminKelimeler');

    }


}//end class
