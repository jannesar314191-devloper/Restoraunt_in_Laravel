@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edite Chefs</h4>
                  
                    <form  method="post" class="forms-sample" enctype="multipart/form-data" action="{{route('chefupdate',['id'=>$chef->id])}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="exampleInputName1">name</label>
                        <input type="text" class="form-control" value="{{$chef->name}}" name="name" id="exampleInputName1" placeholder="tital">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">speciality</label>
                        <input type="text" class="form-control" value="{{$chef->speciality}}" name="speciality" id="exampleInputEmail3" placeholder="description">
                      </div>
                      
                     
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file"  class="form-control" id="image" name="image">
                        <br>
                        <div>
                        <img  style="width:50px ; height: 50px; border-radius: 50%;" src="/chefimage/{{$chef->image}}"  class="img-responsive " alt="Image">
                        </div>
                        </div>
                    
                      
                      
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                   
                    </form>
                  </div>
                </div>
              </div>

        
@endsection