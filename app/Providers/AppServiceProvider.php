<?php

namespace App\Providers;
use View;
use App\Cart;
use App\User;
use App\WishList;
use App\Review;
use App\RecentProduct;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
            if (Auth::check()){
                $count=Cart::where('user_id','=',Auth::id())->count();
                $wishes=WishList::where('user_id','=',Auth::id())->count();
                
                View::share('count', $count);
                View::share('wishes', $wishes);
             
           
       }
    });
        
       
       
        Schema::defaultStringLength(190);
    }
}
