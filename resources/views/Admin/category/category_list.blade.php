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
                <h3 class="card-title">List of Category</h3>
                   <a  href = "{{ url('add-category') }}" class="btn btn-primary float-right btn btn-outline-dark">Add Category </a> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example2" class="table table-bordered table-hover ">
                  <tr >
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="2" >Action</th>
                  </tr>
                  </thead>
                   @foreach ($category as $row)
                 <tr>
                 <td>{{ $row->id }}</td>             
                 <td>{{ $row->name }}</td>
                 <td><a href='edit-category/{{$row->id}}'><button type="button" class="btn btn-primary  btn-sm ">Edit</button></a><b>
                 <a href='delete-category/{{$row->id}}'><button type="button"  class="btn btn-danger  btn-sm">Delete</button></a></td>
                </tr>
                  @endforeach  
                   </table>
              </div>              
            </div>           
          </div>       
        </div>       
      </div>
      
</section>


  @endsection