@extends('admin.layouts.app')
@section('content')

<div class="card-body">

    <div class="row">
                     <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('/insert_slider')}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">




                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" autofocus autocomplete="off">
                  </div>

                 

                  <div class="form-group">
                    <label for="exampleInputFile">Upload Sliders</label>
                    <br>
                    <img id="image" src="#" />
<input type="file"  class="form-control @error('pictures') is-invalid @enderror" name="pictures" 
accept="image/*"  required onchange="readURL(this);">

@error('pictures')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
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