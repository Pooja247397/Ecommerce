@extends('Admin.master')
@section('content')
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              @if(session('success'))
               <div class="alert alert-success" role="alert">
                  {{session('success')}}
               </div>
               @endif
               @if(session('error'))
               <div class="alert alert-danger" role="alert">
                  {{session('error')}}
               </div>
               @endif
              <div class="card-header">

                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ url('admin-update-password') }}" method = "POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">                    
                      <div class="form-group">  
                      <input type="hidden" value ="{{$data->id}}"   name="id"  ><br><b>                      
                        <label for="current_password">Current Password</label>         
                        <input type="password"  class="form-control"  name="current_password">
                      </div>                  
                     <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password"  class="form-control" name="new_password" >
                      </div>                         
                        <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password"  class="form-control" name="confirm_password" >
                      </div>        
                <div class="card-footer" >
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href= "{{ url('admin-dashboard') }}" class = "btn btn-secondary">Close</a>
                </div>
              </div>
              </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection('content')