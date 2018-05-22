<?php

namespace App\Http\Middleware;
use App\User;
use Illuminate\Support\Facades\Auth;
use Closure;

class userControl
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

                if($isAdmin==0){
                   
                    return$next($request);
                }
                else if($isAdmin==1){
                    return redirect('admin/anasayfa');

                }
                
        
       
  }
    else{

        return redirect('giris');
  }
    }//end function
}//end class
