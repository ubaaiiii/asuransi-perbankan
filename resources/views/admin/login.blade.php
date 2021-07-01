@extends('template.app_admin_login')

@section('content_admin_login')


    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
		  	    <img src="{{ url('assets/images/logo.png') }}" style='width:200;height:200px;'>
                <form action="{{url('login')}}" method="post">
                @csrf
                    <h1>Login Form</h1>
                    @if (session('passwordWrong'))
                        <div class="alert alert-danger">
                            {!! session('passwordWrong') !!}
                        </div>
                    @endif
                    <div>
                        <input type="text" class="form-control" placeholder="username" name="username" id="username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="password" name="password" id="password" required="" />
                    </div>
                    <div>
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary w-md waves-effect waves-light btn-block" type="submit">Log In</button>
                    </div>
                    <!-- <button type="submit" class="btn btn-default submit">Sign In</button>

                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div> -->

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>DigiSiap</h1>
                  <p>©2021 All Rights Reserved. digisiap.com</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="#">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> DigiSiap </h1>
                  <p>©2021 All Rights Reserved. digisiap.com</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>

@endsection