<?php

namespace App\Http\Controllers;
use App\Providers\View;
use Illuminate\Http\Request;
use App\Cart;
use App\RecentProduct;
use DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        
        return view('Cart/cart');
    }

    public function addtocart(Request $request,$id)
    {
        if (Auth::user()){
            $product = RecentProduct::find($id);
            $cart=new Cart;
            if (Cart::where('product_id', '=', $product->id)
            ->where('name','=',$product->name )
            ->where( 'size','=',$request->input('size'))
            ->where( 'color','=',$request->input('color') )
            ->where( 'quantity','=',$request->input('qaty'))->exists()) {
                return back();
             }
                 else{
            $cart->user_id=Auth::user()->id;
            $cart->product_id = $product->id;
            $cart->name = $product->name;
            $cart->price=$product->price;
            $cart->totalprice = $product->price*$request->input('qaty');
            $cart->image = $product->image;
            $cart->size = $request->input('size');
            $cart->color = $request->input('color');
            $cart->quantity = $request->input('qaty');
            $cart->save();
                 }
            return back();

        }else{
            return redirect('login');
        }

       
    }
        
       
      


        

    public function showcart($id)
    {
        $carts=Cart::where('user_id',$id)->get();
       $sum = Cart::where('user_id','=',$id)->sum('totalprice');
       //$count=Cart::where('user_id','=',$id)->count();
       //dd($count);
       //dd($carts);
       return view('Cart/cart',compact('carts','sum'));    
       
    }
    public function update(Request $request,$id)
    {
        $cart=Cart::find($id);
       // dd($cart->price);
        $size=$request->input('size');
        $quantity=$request->input('qty');
        $color=$request->input('color');
        $totalprice=$cart->price*$quantity;
       DB::table('cart')->where('id', '=', $cart->id)->update(['size' => $size,'color'=>$color,'quantity'=>$quantity,'totalprice'=>$totalprice]);
       return back();   
       
    }
    public function del($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
       return back();   
       
    }

    

}
