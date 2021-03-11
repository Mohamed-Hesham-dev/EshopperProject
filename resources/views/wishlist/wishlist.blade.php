@extends('App\app')
@section('content')

 <!-- Wishlist Start -->
 <div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product name</th>
                                    <th>Product image</th>
                                    <th>Price</th>
                                    <th>Buy Now</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            @foreach ($whises as $whise)
                            <tbody class="align-middle">
                                <tr>
                                    <td>
                                        <div class="img">
                                            <p>{{$whise->name}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="{{asset($whise->image)}}" alt="Image"></a>
                                        </div>
                                    </td>
                                    <td>{{$whise->price}}</td>
                                    <td>
                                    <a class="btn" href="{{url('product_detail/'.$whise->product_id)}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </td>
                                    <td>
                                        <form action="{{url('delwishe/'.$whise->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        <button  type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        </td>
                                </tr>
                              
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Wishlist End -->

@endsection