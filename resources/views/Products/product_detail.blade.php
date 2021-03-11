@extends('App\app')
@section('content')      
        

        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{url('addToCart/'.$product->id)}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                              
                                   
                                
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="{{ asset($product->image) }}" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2>{{$product->name}}</h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:${{$product->price}}</h4>
                                            
                                        </div>
                                        <div>
                                            <h4>Quantity:</h4>
                                            <div>
                                                <input type="text" name="qaty" >
                                            </div>

                                        </div>
                                        <br>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <input type="checkbox" name="size" value="S"> s <br/>
                                                <input type="checkbox" name="size" value="M"> M <br/>
                                                <input type="checkbox" name="size" value="L"> L <br/>
                                                <input type="checkbox" name="size" value="XL"> XL <br/>
                                            </div> 
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <input type="checkbox" name="color" value="White"> White <br/>
                                                <input type="checkbox" name="color" value="Black"> Black <br/>
                                                <input type="checkbox" name="color" value="Blue"> Blue <br/>
                                            </div> 
                                        </div>
                                        <div class="action">
                                            <button class="btn" type="submit">Add to Cart</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    @if(Auth::user())
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews ({{$reviewcount ?? ''}})</a>
                                    </li>
                                    @endif
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo. 
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <div class="reviews-submitted">
                                           @foreach ($reviews as $review)
                                              
                                          
                                            
                                            <div class="reviewer"> {{$review->user->name}}- <span>{{$review->created_at}} </span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                                {{$review->review}} 
                                              </p>
                                            
                                              @endforeach
                                        </div>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div> 
                                            <form action="{{url('AddReview/'.$product->id)}}" method="get">
                                                <div class="row form">
                
                                                    <div class="col-sm-12">
                                                        <textarea placeholder="Review" name="review"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
             
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
       
        
        @endsection 