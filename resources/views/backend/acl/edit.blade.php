@extends('backend.layouts.app')
@section('content')

<section class="content">
      <div class="container-fluid">



<div class="row">
          <div class="col-md-12">
    <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Edit User </h3> 
            </div>
            <!-- /.card-header -->

            <div class="card-body">

            

         <form class="form-horizontal" action="{{ route('userupdate') }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $user->id }}">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="inputName"  value="{{ $user->name }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="{{ $user->email }}" >
                        </div>
                      </div>




                     
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Permissions</label>
                        <div class="col-sm-10">
                        <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="1"  <?php  if ($user->type == 1)
 {
echo "checked";
}  ?>>

          <label class="form-check-label" for="gridRadios1">
            Admin
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="2" <?php  if ($user->type == 2)
 {
echo "checked";
}  ?>>
          <label class="form-check-label" for="gridRadios2">
            Manager
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="3" <?php  if ($user->type == 3)
 {
echo "checked";
}  ?>>
          <label class="form-check-label" for="gridRadios2">
            User
          </label>
        </div>
                        </div>
                      </div>
                      
                      <br><hr>

   





                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                      </div>
                    </form>


       </div></div></div></div>
</div></section>
@endsection