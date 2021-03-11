@extends('admin.index')
@section('content')
<table class="table table-bordered">
    <thead >
        <tr>
            
            <th>Name</th>
            
            <th>Remove</th>
        </tr>
    </thead>
    @foreach($categories as $category)
    <tbody class="align-middle">
      
        <tr>
            
            
                <td>
                    <div>
                        <p>{{$category->name}}</p>
                    </div>
                </td>
                
           
            

        
          
           
            <form action="{{url('admin/DelCategory/'.$category->id)}}" method="POST" id="fo">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <td>
            <button  type="submit"  onclick="deleteFunction()"><i class="fa fa-trash"></i></button>
                </td>
            </form>
            
        </tr>
        
    </tbody>
    @endforeach
</table>

<script>
    function deleteFunction() {
        event.preventDefault(); 
        var form = document.getElementById("fo");
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
      console.log(form);
    form.submit();
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
    }
</script>

{{$categories->links()}}
</div>
@endsection


