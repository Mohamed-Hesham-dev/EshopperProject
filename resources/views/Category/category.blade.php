@extends('App\app')
@section('content')  






<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    
                    @foreach($products as $item)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">

                            <a href="{{url('product_detail/'.$item->id)}}">{{$item->name}}</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div>
                                <a class="btn" colore="black" href="{{url('AddWhise/'.$item->id)}}"> <i class="fa fa-heart"></i>Add Whishe</a>
                            </div>
                            <div class="product-image">
                            <a href="{{url('product_detail/'.$item->id)}}">
                            <img src="{{asset($item->image)}}" alt="Product Image">
                             </a>
                                
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{$item->price}}</h3>
                                <a class="btn" href="{{url('product_detail/'.$item->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
             
 @endforeach
                </div>
                
                
            </div>           
        </div>
    </div>
</div>
<!-- Product List End -->  






@endsection 