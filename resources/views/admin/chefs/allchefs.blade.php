@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                <h4 class="card-title">Chefs</h4>
               
                <a href="{{route('createchef')}}" class="btn btn-success mb-2">Create New Chefs</a>
               
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> image </th>
                            <th>name </th>
                            <th> speciality</th>
                         
                            
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($chefs as $chef)
                          <tr>
                            <td>{{$chef->id}} </td>
                            <td class="py-1">
                              <img src="/chefimage/{{$chef->image}}" alt="image">
                            </td>
                            <td>
                            {{$chef->name}}
                            </td>
                            <td>{{$chef->speciality}}</td>
                            
                            <td>
                                
                                <a href="{{route('editechef',['id'=>$chef->id])}}" class="btn btn-success">Edit</a> |
                              
                                <form action="{{ route('deletechef', ['id' => $chef->id]) }}" method="POST" class="d-inline delete-form">
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