@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create User</h4>
                  
                    <form  method="post" class="forms-sample" enctype="multipart/form-data" action="{{route('storeuser')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
                      </div>
                     
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        </div>
                    
                      <div class="form-group">
                        <label for="exampleInputCity1">phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                      </div>
                      
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                   
                    </form>
                  </div>
                </div>
              </div>

        
@endsection