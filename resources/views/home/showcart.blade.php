<!DOCTYPE html>
<html lang="en">

  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="/public">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <script src="assets/jquery-3.7.1.js"></script> 


    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
   @include('home.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container" > 

<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">Food_Tital</th>
      <th scope="col">Food_Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($total_price=0)
  @foreach($carts as $cart)
  <tr>
    <td>{{$cart->tital}}</td>
    <td>{{$cart->quantity}}</td>
    <td>{{$cart->quantity * $cart->price}}</td>
    <td>
      <img style="width: 40px;" src="/upload/{{$cart->image}}" class="img-responsive" alt="Image">
    </td>
    <td>
      <form action="{{route('deletecart',['id'=>$cart->id])}}" method="POST" class="d-inline delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger delete-btn">Delete</button>
      </form>
    </td>
  </tr>
  @php($total_price=$total_price+($cart->quantity * $cart->price))
  @endforeach
 
  </tbody>
</table>
   <div style="text-align: center; " class="mt-3 mb-3">
       
        <a href="" class="btn btn-outline-danger"> <h6>Total Price ={{$total_price}}</h6></a>
      <br>
      <br>
       
      <button id="order" class="btn btn-outline-success">Order New</button>
       <br>
     <div  style="width: 400px; text-align: center; margin-right: auto;margin-left: auto;">
       <div class="card-body" >
                    
                    <form class="forms-sample bg-outline-blue" method="post" action="{{route('confirmorder')}}" id="apper" style="display: none;">
                    @csrf  
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" name="name" class="form-control"  placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text"  name="address"class="form-control"  placeholder="address">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" class="form-control"  placeholder="phone">
                      </div>
                     
                     
                      <button type="submit"  class="btn btn-primary me-2">Submit</button>
                      <button id="close" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                  </div>

       
   </div>
</div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    @include('home.about')
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
@include('home.menu')
    <!-- ***** Menu Area Ends ***** -->

  
    <!-- ***** Chefs Area Starts ***** -->
   @include('home.chefs')
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
   @include('home.reservation')
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    @include('home.offers')
    <!-- ***** Chefs Area Ends ***** --> 
    
    <!-- ***** Footer Start ***** -->
   @include('home.footer')

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
     
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
      $('#order').click(
function (){
  $("#apper").show()
}
      );
    </script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });


    </script>
     <script src="admin/sweetalert2.all.min.js"></script>
    
     <script>
      $("#close").click(
function(){
   $("#apper").hide();
}
      );
    </script>
    <script>




         @if(session('status'))
             
             Swal.fire({
                     position: "top-end",
                     icon: "success",
                     title: "{{session('status')}}",
                     showConfirmButton: false,
                     timer: 1500
                    });
                    </script>
                
                @endif
  </body>
</html>