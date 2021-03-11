<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";

    /*public $items=[];
    public $totalQty;
    public $totalprice;

    public function __Construct($cart = null)
    {
        if($cart){
            $this->items=$cart->items;
            $this->totalQty=$cart->totalQty;
            $this->totalprice=$cart->totalprice;
        }else{
            $this->items=[];
            $this->totalQty=0;
            $this->totalprice=0;

        }
    }

    public function add($product,$request)
    {
       // dd($product);
        $item=[
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'qty' => $request->input('qaty'),
            'size'=>$request->input('size'),
            'color'=>$request->input('color'),
            'image'=>$product->image,

        ];
      //dd($item,$this->items);
        if(!array_key_exists( $item['id'], $this->items)){
            $this->items[$product->id]=$item;
            $this->totalQty +=1;
            $this->totalprice +=$product->price*$request->input('qaty');
        } else{
               // dd("ok2");
                $this->totalQty +=1;
                $this->totalprice +=$product->price*$request->input('qaty');
            }
           
       
        $this->items[$product->id]['qty'] = $request->input('qaty');
       // dd($item,$this->items);

    }*/
}
