@extends('frontend.layout.master')

@section('content')
<section id="aa-catg-head-banner">
   <img src="{{asset('frontend/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>

  <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
         	@if(session()->has('cart'))
           <div class="cart-view-table">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
	                  @foreach(session()->get('cart') as $key=>$cart)
                      <tr>
                        <td><a class="remove" href="{{route('cart.remove',$key)}}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{asset('frontend/img/man/polo-shirt-1.png')}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$cart['name']}}</a></td>
                        <td>${{$cart['price']}}</td>
                        <td><input class="aa-cart-quantity" onchange="addToCart(event,{{$key}});" type="number" value="{{$cart['quantity']}}"></td>
                        <td>${{$cart['price']*$cart['quantity']}}</td>
                      </tr>
                      @endforeach
                      <form action="{{route('cart.add')}}" id="cart-form"  method="POST">
                        @csrf
                        <input type="hidden" id="product_id" name="product_id" value="">
                        <input type="hidden" id="item-no" name="item-no" value="">
                      </form>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$450</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
           @else
           <div class="cart-view-table" style="min-height: 240px; margin-bottom: 20px;">
           	<h1>No items on the cart</h1>
           </div>
           @endif
         </div>
       </div>
     </div>
   </div>
 </section>

 <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
  function addToCart(event,id)
  {
    document.getElementById('product_id').value=id;
    let form =document.getElementById('cart-form');
    console.log(event.target.value);
    document.getElementById('item-no').value=event.target.value;
    document.getElementById('cart-form').submit();
  }
  </script>
@endsection