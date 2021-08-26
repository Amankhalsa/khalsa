@extends('admin.admin_master')
@section('title', 'Messagees')

@section('admin')
    <div class="py-12">
              <div class="container">
            <div class="row">
<div class="col-md-12">
<a href="{{route('add_contact')}}" class="float-right text-decoration-none">
    <button class="btn btn-info"> Add Message </button></a><br><br>
<div class="card">

<!-- message  -->

<!-- end message  -->
                  <div class="card-header">All messages</div>
                <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">Sl</th>
      <th scope="col" width="15%"> Name</th>
      <th scope="col" width="20%">Email  </th>
      <th scope="col" width="15%">Subject  </th>

   
      <th scope="col" width="25%">Message</th>

    </tr>
  </thead>

  <tbody>
    <!-- @php( $i =1) -->
@foreach($messages as $msg)
    <tr>
 <!-- <th scope="row">{{$i++}}</th> -->
 <th scope="row">{{$loop->index+1}}</th>

 
  <td class="text-success font-weight-bold">{{ ucwords($msg->name)}} </td>
  <td class="text-primary font-weight-bold">{{ ucwords($msg->email	)}} </td>
  <td class="text-dark font-weight-bold">{{ ucwords($msg->subject	)}} </td> 
  <td class="text-dark font-weight-bold">{{ ucwords($msg->message	)}} </td>   



  <td class="font-weight-bold">

<a href="{{url('message/delete/'.$msg->id)}}" onclick="return confirm('Are you confirm for delete ?')"
 class="btn btn-danger">Delete</a>


  </td>     

    </tr>
@endforeach
  </tbody>
</table>

           
                </div>
              </div>
  

        
        </div>
        </div>



    </div>
@endsection
  