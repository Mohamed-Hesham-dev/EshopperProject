<?php

namespace App\Http\Controllers;
use App\Providers\View;
use Illuminate\Http\Request;
use App\whise;
use App\WishList;
use App\RecentProduct;
use DB;
use Illuminate\Support\Facades\Auth;


class WishListController extends Controller
{
    
    

    public function showwishe($id)
    {
        $whises=WishList::where('user_id',$id)->get();
      
      // dd($whises);
       return view('wishlist/wishlist',compact('whises'));    
       
    }

    public function addtowhise(Request $request,$id)
    {
        if (Auth::user()){
            $product = RecentProduct::find($id);
            $whise=new WishList;
            if (WishList::where('product_id', '=', $product->id)
            ->where('name','=',$product->name )
            ->where( 'price','=',$product->price)
            ->where( 'image','=',$product->image )->exists()) {
                return back()->with('error', 'thise item you are whished!');
             }else{
                $whise->user_id=Auth::user()->id;
                $whise->product_id = $product->id;
                $whise->name = $product->name;
                $whise->price=$product->price;
                $whise->image = $product->image;
                $whise->save();
                   return back();
               
             }
            }else{
                return redirect('login');
            }
            

       

       
    }

    public function delwishe($id)
    {
        $whise=WishList::find($id);
        $whise->delete();
       return back();   
       
    }
        


}
