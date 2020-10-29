      @extends('admin.layouts.app')
@section('content')

       <div class="row">
	          <div class="col-md-12">
	               <div class="card card-primary">
            <div class="card-header info">
              <h3 class="card-title">Slider List</h3>
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
                	 @foreach($all as $row)
                <tr>
                	<td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  
                  <td><img src="{{ $row->pictures }}" style="height: 60px; width: 60px;">
                  </td>
                  
                  <td>
 <!--    <a href="{{ URL::to('view-drreferel/'.$row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a> -->

                   <a href="{{ URL::to('/edit_slider/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{ URL::to('delete_slider/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">
                                                	<i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
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