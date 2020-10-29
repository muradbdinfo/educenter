@extends('admin.layouts.app')
@section('content')

<div class="card-body">
    <div class="row">
                     <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('/update_slider/'.$edit->id)}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$edit->name}}">
                  </div>                

                    
                  




<div class="form-group">

<img src="{{ URL::to($edit->pictures) }}"  style="height: 200px; width: 700px;">

<input type="hidden" name="old_photo" value="{{ $edit->pictures }}">

</div>

<div class="form-group">
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