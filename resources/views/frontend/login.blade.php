@extends('layouts.master_frontend')
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{asset('/storage/product_images/team-1.jpg')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="{{url('login')}}" method = "POST">
                  @csrf
                  
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Fruitkha</span>
                  </div>
                   <a  href="{{ url('/home') }}" class="btn btn-primary float-right">Home</a>
                  <h6 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log-In</h6>
                  
                  <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    
                  </div>
                   <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ url('register') }}"
                      style="color: #393f81;">Register here</a></p>
                   </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

