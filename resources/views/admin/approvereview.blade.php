@extends('admin.index')
@section('content')
<table class="table table-bordered">
    <thead >
        <tr>
            
            <th>User Name</th>
            <th>Review</th>
            
        </tr>
    </thead>
    @foreach($reviews as $review)
    <tbody class="align-middle">
      
        <tr>
            
            
                <td>
                    <div>
                        <p>{{$review->user->name}}</p>
                    </div>
                </td>
                
                <td>{{$review->review}}</td>
           
           
            
        </tr>
        
    </tbody>
    @endforeach
</table>


</div>
@endsection


