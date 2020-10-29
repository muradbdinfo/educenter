      @extends('backend.layouts.app')
@section('content')

       <div class="row">
	          <div class="col-md-12">
	               <div class="card card-primary">
            <div class="card-header info">
              <h3 class="card-title">Contact List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Email</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                	 @foreach($list as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->subject }}</td>
<td>{{ $row->email }}</td>


<td>
 <a href="{{ URL::to('/edit_contact/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ URL::to('delete_contact/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
<a href="{{ URL::to('view_contact/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
</td>
</tr>
                 @endforeach
                
                </tbody>
                <tfoot>
<tr>

<th>ID</th>
<th>Name</th>
<th>Subject</th>
<th>Email</th>
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

            @endsection