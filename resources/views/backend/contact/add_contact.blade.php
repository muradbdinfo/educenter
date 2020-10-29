@extends('backend.layouts.app')
@section('content')

<div class="card-body">
    <div class="row">

      <div class="col-md-2">

      </div>
                     <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('/insert_contact')}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">


<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Contact Name">

@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>


<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input type="email" name="email"   class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Date">

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Subject</label>
<input type="text" name="subject"   class="form-control @error('subject') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Date">

@error('subject')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Mobile</label>
<input type="text" name="mobile"   class="form-control @error('mobile') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Date">

@error('mobile')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>



<div class="form-group">
<label for="exampleInputPassword1">Details</label>      

<textarea class="textarea" name="details"  placeholder="Place some text here"
style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">  </textarea>
</div>




                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>


 <div class="col-md-2">

      </div>


            </div>
            <!-- /.row -->
        </div>

</script>

@endsection