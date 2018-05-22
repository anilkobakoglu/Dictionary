<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\kelimeler;
use Illuminate\Support\Facades\Auth;


class kelimeAra extends Controller
{

    public function index(Request $request){

    	$user_id=\Auth::id();

    	$formKelime=$request->search;


    	if(!empty($formKelime)){

       	//bu kişinin id sine ait olanlarda arama yapıcaz onun için bir koşulumuz ve diğer koşullarımız olacğıdnan böyle bir sistem kullandım

		    	$search_kelime=kelimeler::where('users_id',$user_id)

				->where(function($query) use($formKelime){

				$query->where('enKelime',$formKelime)->orWhere('trKelime',$formKelime);

				})->get();

    	}
    	else{

				// boş veri geliyorsa bu sayfaya yönlendir.
    			return redirect('kelimelerim');
    	}

    	
    	
    	
    	
		// böyle bir değer var mı yani yukarıdaki koşul sağlandı mı
    	if($search_kelime->count()){ 

			
			return redirect()->back()->with('search_kelime',$search_kelime);
    	}else{

    		echo 'Havuzunuzda böyle bir kelime bulunmamaktadır.' ;

			header('Refresh: 0.5; url=/kelimelerim');

    		    	// buraya bunu mu demek isteniniz yapılacak
    		/*->where(function($query) use($formKelime){

    				$query->where('enKelime','like', '%' . $formKelime . '%')->orWhere('trKelime','like', '%' . $formKelime . '%');

    		})->get();*/
    	}


    		
    	


   


    }//end function
}//end class
