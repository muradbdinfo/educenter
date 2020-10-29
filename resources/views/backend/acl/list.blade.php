@extends('backend.layouts.app')
@section('content')

<section class="content">
      <div class="container-fluid">



 
      <div class="row">
	          <div class="col-md-12">



            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Pictures</th>
                  <th> Rule </th>
                  <th>Action</th>
                  
                </tr>

                  </thead>
                  <tbody>
                
                  @foreach($list as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->email }}</td>
<td>{{ $row->mobile }}</td>
<td><img src="{{ $row->pictures }}" style="height: 60px; width: 60px;">
</td>

<td>    
    
@if($row->type == 1)
<span class="badge badge-warning">Admin</span>
@else
@endif 

@if($row->type == 2)
<span class="badge badge-warning">Manager</span>
@else
@endif 


@if($row->type == 3)
<span class="badge badge-warning">User</span>
@else
@endif 
</td>

<td>
@if(auth::user()-> type == 1)
 <a href="{{ URL::to('/useredit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ URL::to('userdelete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>

<a href="{{ URL::to('view_notice/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
@else
  @endif

  @if(auth::user()-> type == 2)
 <a href="{{ URL::to('/useredit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ URL::to('view_notice/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
@else
  @endif

  @if(auth::user()-> type == 3)

<a href="{{ URL::to('view_notice/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
@else
  @endif
</td>
</tr>
                 @endforeach

                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Pictures</th>
                  <th> Rule </th>

                  <th>Action</th>
                  
                </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>



          <!-- /.card -->
	          </div>
            </div>



   


</div>

     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection