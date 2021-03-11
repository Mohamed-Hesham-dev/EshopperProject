
@extends('App\app')
@section('content')
<form action="{{url('order',Auth::user()->id)}}" method="POST" id="f">
    {{ csrf_field() }}
<div class="col-lg-4">
    <div class="checkout-inner">
        <div class="checkout-summary">
            <h1>Your Order</h1>
            <p>Total Cost:<span>$ {{$sum}}</span></p>
            
        </div>

        <div class="checkout-payment">
      
            <div class="checkout-btn">
                <button type="submit" onclick="fFunction()">Place Order</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    function fFunction() {
        event.preventDefault(); 
        var form = document.getElementById("f");
  Swal.fire({
  title: 'OK! your order ',
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