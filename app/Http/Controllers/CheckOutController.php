<?php

namespace App\Http\Controllers;
use App\Providers\View;
use App\Cart;
use App\Addresses;
use App\User;
use App\Order;
use App\Orderitem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function showaddress()
    {
        if (Auth::check()){
       // $carts=Cart::where('user_id',Auth::id())->get();
        $sum = Cart::where('user_id','=',Auth::id())->sum('totalprice');
        //dd($sum);
        if($sum){
            return view('Cart/address');
        }else{
            return back()->with('error', 'no item here!');
        }
       
        }
       // return view('Cart/cart');
    }
    public function saveaddress(Request $request ,$id)
    {
        $adress=new Addresses;
       // dd(Auth::user()->id);
       // $user = User::find($id);
        $adress->user_id=Auth::user()->id;
       
        $adress->phone_number = $request->input('mobile');
        $adress->address = $request->input('address');
        $adress->city = $request->input('city');
        $adress->country = $request->input('country');
        $adress->save();
        return redirect('order');
    }

    public function showorder()
    {
        $carts=Cart::all();
        $sum = Cart::sum('totalprice');
        return view('Cart/yourorder',compact('sum'));
    }

    public function saveorder(Request $request ,$id)
    {
        
        
       $order=new Order;
        $order->user_id=Auth::user()->id;
        $order->total_price =Cart::sum('totalprice');
        $order->save();
        $carts=Cart::where('user_id',$id)->get();
            foreach($carts as $cart)
            {
                $orderitem=new Orderitem();
                $orderitem->order_id=$order->id;
                $orderitem->product_id=$cart->product_id;
                $orderitem->quantity=$cart->quantity;
                $orderitem->color=$cart->color;
                $orderitem->size=$cart->size;
                $orderitem->price=$cart->totalprice;
                Cart::where('user_id',$id)->delete();
                $orderitem->save();
               // dd($cart->product_id);
            }
            //DB::table('cart')->where('user_id', '=', $id)->delete();
           // DB::delete('delete from cart where user_id = ?',[$id]);
           Cart::where('user_id',$id)->delete();
         return redirect(route('index'));
     
    }
   /* public function delorder($id)
    {
        Cart::where('user_id',$id)->get()->delete();
        return redirect('order');  
       
    }*/

}
