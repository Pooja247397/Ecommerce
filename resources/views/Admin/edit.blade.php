@extends('Admin.master')
@section('content')
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ url('admin-update') }}" method = "POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">  
                    <input type="hidden" value ="{{$adm->id}}"   name="id"  ><br><br>                
                      <div class="form-group">                        
                        <label for="Name">Name</label>                        
                  <input type="text"  class="form-control" value ="{{$adm->name}}" name="name">                  
                     </div>                  
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value ="{{$adm->email}}" class="form-control" name="email" >
                      </div>                         
                      <div class="form-group"> 
                          <label for = "image"><b>Change image : </b></label><br>
                            @if($adm->image)
                            <img height="100" width="100" src="{{asset('/storage/admin_images/'.$adm->image)}}">
                            @else
                            <img height="100" width="100" src="{{asset('/Admin/admin.jpg')}}">
                          @endif  <br><br>
                          <input type="file" name="image">
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