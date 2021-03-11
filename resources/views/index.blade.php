@extends('App.app')
@section('content')

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section-header">
                            <h3>Category Product</h3>
                        </div>
                      
                        <nav class="navbar bg-light">
                           
                                
                            <ul class="navbar-nav">
                                @foreach ($categorys2 as $item)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('Ctegory/'.$item->id)}}"><i  class="fa fa-tshirt"></i>{{$item->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                           
                        </nav>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                        @foreach($sliders as $slider)
                            <div class="header-slider-item">
                                <img src="{{$slider->image}}" alt="Slider Image" width="950" height="450" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                  
                        <div class="header-img">
                        @foreach($categorys as $category)
                            <div class="img-item">
                                <img src="{{$category->image}}" />
                            </div>
                            @endforeach
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
       
        <div class="brand">
           
            <div class="container-fluid">
                <div class="brand-slider">
                @foreach($brands as $brand)
                    <div class="brand-item"><img src="{{$brand->image}}" alt=""></div>
                    @endforeach
                </div>
            </div>
        </div>
      
        <!-- Brand End -->      
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                @foreach($features as $feature)
                    <div class="col-lg-3 col-md-6 feature-col">
                    
                        <div class="feature-content">
                        
                        <img src="{{$feature->image}}" alt="">
                            <h2>{{$feature->title}}</h2>
                            <p>
                            {{$feature->desc}}
                            </p>
                        </div>
                        
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
          
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+012-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
       
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div>
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                </div>
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                
                @foreach($recentproducts as $recentproduct)
                    @if($recentproduct->status=='feature')
                    <div class="col-lg-3">
                   
                        <div class="product-item">
                            <div class="product-title">
                                {{$recentproduct->name}}
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    
                                </div>
                                
                            </div>
                            <div>
                                <a class="btn" colore="black" href="{{url('AddWhise/'.$recentproduct->id)}}"> <i class="fa fa-heart"></i>Add Whishe</a>
                            </div>
                            <div class="product-image">
                                <a  href="{{url('product_detail/'.$recentproduct->id)}}">
                                    <img src="{{$recentproduct->image}}" alt="Product Image" width="1000px" height="300">
                                </a>
                                
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{$recentproduct->price}}</h3>
                               
                                <a class="btn" href="{{url('product_detail/'.$recentproduct->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    @endif
                        @endforeach
                </div>
            </div>
        </div>
      
        <!-- Featured Product End -->       
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Recent Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                @foreach($recentproducts as $recentproduct)
                    @if($recentproduct->status=='recent')
                    <div class="col-lg-3">
                        <div class="product-item">

                            <div class="product-title">
                                {{$recentproduct->name}}
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div>
                                <a class="btn" colore="black" href="{{url('AddWhise/'.$recentproduct->id)}}"> <i class="fa fa-heart"></i>Add Whishe</a>
                            </div>
                            <div class="product-image">
                                <a  href="{{url('product_detail/'.$recentproduct->id)}}">
                                    <img src="{{$recentproduct->image}}" alt="Product Image">
                               
                                </a>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{$recentproduct->price}}</h3>
                                 <a class="btn" href="{{url('product_detail/'.$recentproduct->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                            
                        </div>
                       
                    </div>
                    @endif
                        @endforeach
                </div>    
            </div>
        </div>
       
        <!-- Recent Product End -->
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Subscribe Our Newsletter</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input type="email" value="Your email here">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->  
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-1.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-2.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-3.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review End -->        
        
      @endsection 