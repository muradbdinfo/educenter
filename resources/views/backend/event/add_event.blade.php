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
                <h3 class="card-title">Add Event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('/insert_event')}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">


<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Event Name">

@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Location</label>
<input type="text" name="location"  class="form-control @error('location') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Location Name">

@error('location')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail1">Date</label>
<input type="date" name="date"   class="form-control @error('date') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Date">

@error('date')
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


<div class="form-group">
  <label for="exampleInputEmail1">Pictures</label><br>

<img id="image" src="#" />

<input type="file"  name="pictures" accept="image/*"   onchange="readURL(this);">
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

                        <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection