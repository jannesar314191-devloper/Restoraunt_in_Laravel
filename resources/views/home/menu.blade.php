<section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    @foreach($foods as $food)
                    <form action="{{route('storecard',['id'=>$food->id])}}" method="post">
                        @csrf
                    <div class="item">
                        <div style="background-image:url('/upload/{{$food->image}}');" class='card '>
                            <div class="price"><h6>${{$food->price}}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$food->tital}}</h1>
                              <p class='description'>{{$food->description}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                       
                        </div>
                        </div>
                        <div style="text-align: center;">

                        <input type="number" class="w-75 m-2" value="1" min="1" name="quantity"   style="border-radius:25px ;text-align:center ; color:brown">
                        <input class="btn btn-danger w-75" type="submit" style="border-radius:25px ;text-align:center ;" value="Add Card" >
                        </div>
                    
                   
                        
                    
                    </form>
                    @endforeach
                    
                  
                </div>
            </div>
        </div>
    </section>