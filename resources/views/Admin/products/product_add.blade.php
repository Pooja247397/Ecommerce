@extends('Admin.master')
@section('content')
<section class="content">
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action= "{{ url('save-productlist') }}" method = "POST" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name ="title" class="form-control" id="title" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" name ="product_image" class="form-control" id="content" placeholder="select image">
                  </div> 
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name ="description" class="form-control" id="description" placeholder="Enter description">
                  </div>                 
                  <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" name ="price" class="form-control" id="price" placeholder=" Enter price">
                  </div>
                  <div class = "form-group">
                  	   <label>Main Category </label>
                       <select name="category_id" id="category" class="category">
                       <option disable selected>--select category--</option>
                       @foreach ($category as $item) 
                       <option value="{{ $item->id }}">{{ $item->name}}</option>
                       @endforeach 
                     </select>
                  </div>

                   <div class = "form-group">
                       <label>Choose Multiple Category </label>
                       <select name="mcat_id[]" id="category" multiple class="form-control"  >
                       <!-- <option disable selected></option> -->
                       @foreach ($category as $item) 
                       <option value="{{ $item->id }}">{{ $item->name}}</option>
                       @endforeach 
                     </select>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
              </form>
            </div>
        </section>  
 @endsection