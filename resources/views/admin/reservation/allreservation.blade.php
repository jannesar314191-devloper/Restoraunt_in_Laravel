@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="card">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                <h4 class="card-title">Reservations</h4>
               
                
               
            </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> name </th>
                            <th> email</th>
                            <th> phone </th>
                            <th> message</th>
                            <th> guest</th>
                            <th> time</th>
                            <th> date</th>
                            <th>action</th>

                            
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($reservations as $reservation)
                          <tr>
                            <td>{{$reservation->id}} </td>
                           
                            <td>
                            {{$reservation->name}}
                            </td>
                            <td>{{$reservation->email}}</td>
                            <td> {{$reservation->phone}} </td>
                            <td> {{$reservation->message}} </td>
                            <td> {{$reservation->guest}} </td>
                            <td> {{$reservation->time}} </td>
                            <td> {{$reservation->date}} </td>

                           
                            <td>
                                
                                
                              
                                <form action="{{ route('deletereservation', ['id' => $reservation->id]) }}" method="POST" class="d-inline delete-form">
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