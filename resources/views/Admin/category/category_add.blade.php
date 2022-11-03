@extends('Admin.master')
@section('content')
<section class="content">
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>          
              <form action= "{{ url('save-categorylist') }}" method = "POST">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                     <label for="name"><b> Name  :  </b></label>
                     <input type="text" name="name" id="name" >
                  </div>              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                   <a href= "{{ url('category-list') }}" class = "btn btn-secondary">Close</a>
                </div>
              </form>
            </div>
        </section>  
@endsection