@extends('admin.index')
@section('content')


 


            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>ShowReview</th>
                
              </tr>
              </thead>
             
              <tbody class="align-middle">
                
                @foreach($reviews as $review)
              <tr>
                 
                <td>
                  <div>
                      <p>{{$review->product->name}}</p>
                  </div>
              </td>
              <td>
                  <div class="product-image">
                      <img src="{{asset($review->product->image)}}" alt="Image" width="50px">
                     
                  </div>
              </td>
              
         
          <td>
          
         <a href="{{url('admin/Approve/'.$review->product->id)}}"> <button  type="button" >Show Review</button></a>
          
          </td>

              </tr>
              @endforeach
              </tbody>
                 
            </table>
    
              


@endsection
