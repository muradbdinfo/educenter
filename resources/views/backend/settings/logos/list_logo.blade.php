@extends('backend.layouts.app')
@section('content')

<section class="content">
      <div class="container-fluid">


       <div class="row">
	          <div class="col-md-12">
	               <div class="card card-primary">
            <div class="card-header info">
              <h3 class="card-title">Logo List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Pictures</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                	 @foreach($list as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->name }}</td>
<td><img src="{{ $row->pictures }}" style="height: 60px; width: 60px;">
</td>

<td>
 <a href="{{ URL::to('/edit_logo/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ URL::to('delete_logo/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
<a href="{{ URL::to('view_logo/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
</td>
</tr>
                 @endforeach
                
                </tbody>
                <tfoot>
<tr>
<th>ID</th>
<th>Name</th>

<th>Pictures</th>
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