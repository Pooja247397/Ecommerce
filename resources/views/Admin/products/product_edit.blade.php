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
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form action= "{{ url('update-product') }}" method = "POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden"  value="{{ $product->id }}" name="id"  >
                    <label for="title">Title</label>
                    <input type="text" name ="title"  value="{{ $product->title }}"class="form-control"  >
                  </div>                 
                  <div class="form-group">
                    <image height = "80px" width = "100px" src = "{{asset('/storage/product_images/'.$product->product_image)}}"/><br>
                    <label for = "image"><b>Change image : </b></label>
                    <input type="file"  name="product_image">                 
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name ="description"  value="{{ $product->description }}" class="form-control" >
                  </div>                 
                  <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" name ="price" value="{{ $product->price }}" class="form-control" >
                  </div>
                  <div class = "form-group">
                       <label>Change Main Category</label>
                       <select name="category_id" class="category">                      
                       @foreach ($category as $item) 
                       <option @if($product->category_id==$item->id){{'selected'}} @endif value="{{ $item->id }}">{{ $item->name}}
                       </option>
                       @endforeach 
                     </select>
                  </div>
                      <div class = "form-group">
                       <label>Change Multiple Category </label>
                       <select name="mcat_id[]" id="category" multiple class="form-control"  >
                       <!-- <option disable selected>--select category--</option> -->
                       @foreach ($category as $item) 
                       <option value="{{ $item->id }}">{{ $item->name}}</option>
                       @endforeach 
                     </select>
                  </div> 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                   <a href= "{{ url('product-list') }}" class = "btn btn-secondary">Close</a>
                </div>
              </form>
            </div>
        </section>  
 @endsection
