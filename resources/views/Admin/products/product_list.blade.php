@extends('Admin.master')
@section('content')
@if(session('status'))
  <div class="alert alert-success" role="alert">
       {{session('status')}}
     </div>
     @endif
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of 	Product</h3>
                   <a  href = "{{ url('add-product') }}" class="btn btn-primary float-right btn btn-outline-dark">Add Product </a> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <th>Id</th>
                    <th>Category_Name</th> 
                    <th>Title</th>                 
                    <th>Product_Image</th>                    
                    <th>Description</th>
                    <th>Price</th>                  
                    <th>Created_At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @foreach($category as $row)
                  <tr>
                  <td>{{ $row->id }}</td> 
                  <td>
            <!-- esme categorie function name h jo product model me h -->
                  <?php echo $row->categorie->name; ?>
                  </td>
                 <td>{{ $row->title }}</td>
                  <td><img height = "50px" src="{{asset('/storage/product_images/'.$row->product_image)}}"></td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->created_at->format('d/m/Y') }}</td>
                    <td><a href='edit-product/{{$row->id}}'><button type="button" class="btn btn-primary  btn-sm ">Edit</button></a></td>
                 <td><a href='delete-product/{{$row->id}}'><button type="button"  class="btn btn-danger  btn-sm">Delete</button></a></td>
               </tr>
                  @endforeach
                   </table>
              </div>              
            </div>          
          </div>        
        </div>       
      </div>      
</section>
@endsection('content')