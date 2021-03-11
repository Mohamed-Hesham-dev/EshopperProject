@extends('App\app')
@section('content')

<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                   
                    <div class="table-responsive">
                        @if(collect($carts)->isEmpty())
                        <span>"no items"</span>
                        <br><br>
                        <div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                        </div>
                        @else
                        <table class="table table-bordered">
                            <thead >
                                <tr>
                                    
                                    <th>title</th>
                                    <th>image</th>
                                    <th>Price of pieces</th>
                                    <th>Quantity</th>
                                    <th>size</th>
                                    <th>color</th>
                                    <th>Total Price</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            @foreach ($carts as $cart)
                            <tbody class="align-middle">
                              
                                <tr>
                                    <td>
                                        <div>
                                            <p>{{$cart->name}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="img">
                                            <img src="{{asset($cart->image)}}" alt="Image">
                                           
                                        </div>
                                    </td>
                                    <td>{{$cart->price}}</td>
                                    <form action="{{url('update/'.$cart->id)}}" method="POST">
                                        {{ csrf_field() }}
                                    <td>
                                        <input type="text" name ="qty" value="{{$cart->quantity}}">
                                    </td>
                                    <td>
                                        <input type="text" name="size" value="{{$cart->size}}"> 
                                    </td>
                                    <td>
                                       <input type="text"  name="color" value="{{$cart->color}}">  
                                    </td>
                                    <td>{{$cart->totalprice}}</td>
                                    <td>
                                    
                                    <button  type="submit"><i class="fas fa-edit"></i></button>
                                    
                                    </td>

                                </form>
                                    <td>
                                    <form action="{{url('del/'.$cart->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                    <button  type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                
                            </tbody>
                            @endforeach
                        </table>
                       
                       
                        
                        @endif 
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Total Cart<span>{{$sum}}</span></p>
                                    
                                </div>
                                
                                <div class="cart-btn">
                                    <center><button><a href="{{url('Addresses')}}" >Checkout</a></button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart End -->




<!-- Cart Start -->

@endsection 