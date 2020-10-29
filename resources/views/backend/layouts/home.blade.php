@extends('backend.layouts.app')
@section('content')

<section class="content">
      <div class="container-fluid">



      <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>



   


</div>

     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection