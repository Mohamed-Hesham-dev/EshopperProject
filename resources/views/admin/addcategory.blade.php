@extends('admin.index')
@section('content')

            <form action="{{url('admin/AddCategory')}}" method="post" enctype="multipart/form-data" id="fo1">
                {{ csrf_field() }}
               
                    <div>
                      Name Category:  <input type="text"  name="name" >
                        
                    </div>
                    <button  type="submit"  onclick="addFunction()"><i class="fas fa-save" > Save</i></button>
            
          

        </form>
        <script>
          function addFunction() {
              event.preventDefault(); 
              var form = document.getElementById("fo1");
              Swal.fire({
        title: 'Are you sure?',
        text: " work has been saved",
       
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!'
       
      }).then((result) => {
        if (result.value) {
            console.log(form);
      
          form.submit();
          Swal.fire(
            'SUCCESS',
            'Your work has been saved.',
            
          )
        }
      })
          }
      </script>
    
@endsection