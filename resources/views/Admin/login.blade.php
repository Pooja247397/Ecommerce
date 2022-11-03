<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dashboard</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="{{asset('Admin/docs/assets/plugins/fontawesome-free/css/all.min.css ')}}">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="{{asset('Admin/build/scss/plugins/_icheck-bootstrap.scss')}}">
      <link rel="stylesheet" href="{{asset('Admin/dist/css/adminlte.min.css')}}">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="login-logo">
            <a href=""><b>Admin</b></a>
         </div>
         <div class="card">
            <div class="card-header">
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
               @if(count($errors)> 0)
               <div class="alert alert-danger">
                  <ul>
                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                     @endforeach
                  </ul>
               </div>
               @endif    
            </div>
            <div class="card-body login-card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form action="{{url('submit_login')}}" method="post">
                  @csrf
                  <div class="input-group mb-3">
                     <input type="email" class="form-control" name="email" placeholder="Email">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="password" placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- /.col -->
                     <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                     <!-- /.col -->
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{asset('Admin/docs/assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('Admin/docs/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('../Admin/dist/js/adminlte.js')}}"></script>
   </body>
</html>