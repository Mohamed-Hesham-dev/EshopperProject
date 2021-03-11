@extends('admin.index')
@section('content')
<table class="table table-bordered">
    <thead >
        <tr>
            
            <th>Name</th>
            <th>Image</th>
            <th>Price Of Pieces</th>
            <th>Status</th>
            <th>Modify</th>
            
            
        </tr>
    </thead>
    <tbody class="align-middle">
      
        <tr>
            
            <form action="{{url('admin/modifyproduct/'.$product->id)}}" id="fo2" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <td>
                    <div>
                        <input type="text"  name="name" value="{{$product->name}}">
                        
                    </div>
                </td>
                <td>
                    <div class="product-image">
                        <input type="file" class="custom-file-lable" name="image" value="{{$product->image}}">
                        <label class="custom-file-lable"></label>
                        
                    </div>
                </td>
                <td>
                    <input type="text"  name="price" value="{{$product->price}}">
                </td>
                <td>
                    <input type="text"  name="status" value="{{$product->status}}">
                </td>
           
            <td>
            
            <button  type="submit" onclick="updateFunction()"><i class="fas fa-sync" ></i></button>
            
            </td>

        </form>
        </tr>
    </tbody>
</table>
</div>


<script>
    function updateFunction() {
        event.preventDefault(); 
        var form = document.getElementById("fo2");
        
  

  Swal.fire({
  title: 'Are you sure?',
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
}).then((result) => {
  if (result.value) {
      console.log(form);
    form.submit();  
  }
})
    }
</script>

@endsection