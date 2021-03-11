@extends('App\app')
@section('content')  
        <!-- Breadcrumb Start -->
        <div>
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
            </div>
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Products</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                        <div class="search">
                                        <form action="{{url('product_list')}}" method="GET">
                                       <input type="text" name="search" placeholder="Search" required/>
                                       <button ><i class="fa fa-search"></i></button>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            @if($results->isNotEmpty())
                            @foreach ($results as $result)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">

                                    <a href="{{url('product_detail/'.$result->id)}}">{{ $result->name }}</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn" colore="black" href="{{url('AddWhise/'.$result->id)}}"> <i class="fa fa-heart"></i>Add Whishe</a>
                                    </div>
                                    <div class="product-image">
                                    <a href="{{url('product_detail/'.$result->id)}}">
                                    <img src="{{ $result->image }}" alt="Product Image">
                                     </a>
                                       
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{ $result->price }}</h3>
                                        <a class="btn" href="{{url('product_detail/'.$result->id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            
         @endforeach
         @endif
                        </div>
                       
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                    </div>           
                    
                    
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
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
        
        @endsection 