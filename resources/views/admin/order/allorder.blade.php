@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                <h4 class="card-title">Orders</h4>
               
                
               
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> image </th>
                            <th> User Name</th>
                            <th> Address</th>
                            <th> Food Name</th>
                            
                            <th> Quantity</th>
                            <th> Price</th>
                            
                            <th> Total Price</th>
                            <th> Phone -NO</th>
                            
                            

                            
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($orders as $order)
                          <tr>
                            <td>{{$order->id}} </td>
                            <td class="py-1">
                              <img src="/upload/{{$order->image}}" alt="image">
                            </td>
                            <td>
                            {{$order->name}}
                            </td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->tital}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->price *$order->quantity}}</td>
                            <td>{{$order->phone}}</td>
                            
                           
           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        
@endsection