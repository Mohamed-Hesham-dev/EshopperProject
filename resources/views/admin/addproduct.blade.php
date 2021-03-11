@extends('admin.index')
@section('content')

            <form action="{{url('admin/Addproduct')}}" method="post" enctype="multipart/form-data" id="fo1">
                {{ csrf_field() }}
               
                    <div>
                      Name:  <input type="text"  name="name" >
                        
                    </div>
                    <div>
                      Category:  <select  name="category_id">
                        @foreach($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                        
                    </div>
                    <br>
                    <div class="product-image">
                      Image:  <input type="file" class="custom-file-lable" name="image" >
                        <label class="custom-file-lable"></label>
                        
                    </div>
                    <br>
            <div>
              
                   Price: <input type="text"  name="price" >
            </div>
            <br>
            <div>
                
                  Status:  <input type="text"  name="status" >
            </div>
            <br>
            
            
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