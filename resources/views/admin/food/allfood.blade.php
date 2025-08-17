@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                <h4 class="card-title">Foods</h4>
               
                <a href="{{route('createfood')}}" class="btn btn-success mb-2">Create New Foods</a>
               
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> image </th>
                            <th> tital</th>
                            <th> description </th>
                            <th> price</th>
                            
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($foods as $food)
                          <tr>
                            <td>{{$food->id}} </td>
                            <td class="py-1">
                              <img src="/upload/{{$food->image}}" alt="image">
                            </td>
                            <td>
                            {{$food->tital}}
                            </td>
                            <td>{{$food->description}}</td>
                            <td> {{$food->price}} </td>
                            <td>
                                
                                <a href="{{route('editefood',['id'=>$food->id])}}" class="btn btn-success">Edit</a> |
                              
                                <form action="{{ route('deletefood', ['id' => $food->id]) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">Delete</button>

                                </form>
                           
                            </td>
           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: "",
            text: "do you wont to delete this",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>


        
@endsection