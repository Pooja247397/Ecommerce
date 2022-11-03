@extends('Admin.master')
@section('content')
@if(session('status'))
  <div class="alert alert-success" role="alert">
       {{session('status')}}
     </div>
     @endif
<section class="content">
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action= "{{ url('update-category') }}" method = "POST">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden"  value="{{ $category->id }}" name="id"  ><br><br>

                    <label for="name">Name : </label>
                    <input type="text"   value="{{ $category->name }}" name ="name" >
                  </div>                  
            
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href= "{{ url('category-list') }}" class = "btn btn-secondary">Close</a>
                </div>
              </form>
            </div>
        </section>  
 @endsection