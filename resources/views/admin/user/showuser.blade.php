@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                <h4 class="card-title">Users</h4>
               
                <a href="{{route('createuser')}}" class="btn btn-success mb-2">Create New User</a>
               
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> image </th>
                            <th> First name </th>
                            <th> address </th>
                            <th> phone</th>
                            <th> action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}} </td>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image">
                            </td>
                            <td>
                            {{$user->name}}
                            </td>
                            <td>{{$user->address}}</td>
                            <td> {{$user->phone}} </td>
                            <td>
                                
                                <a href="{{route('editeuser',['id'=>$user->id])}}" class="btn btn-success">Edit</a> |
                              
                                <form action="{{ route('deleteuser', ['id' => $user->id]) }}" method="POST" class="d-inline delete-form">
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