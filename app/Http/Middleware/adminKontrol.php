<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class adminKontrol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    if(Auth::check()){
       $id=Auth::id();
       $isAdmin=User::where('id',$id)->select('isAdmin')->value('isAdmin');

                if($isAdmin==1){
                   
                    return$next($request);
                }
                else{

                    return redirect("anasayfa");
                }
    }//end first if

    else{

        return redirect('giris');
    }
}//end function

}//end class
