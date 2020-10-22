@extends('layouts.app')

@section('content')
        <div class="wrapper without_header_sidebar">
            <!-- contnet wrapper -->
            <div class="content_wrapper">
                    <!-- page content -->
                    <div class="login_page center_container">
                        <div class="center_content">

                            <!-- Contact Form -->

                            <div class="contact_form">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-heading text-center">Login</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('login')  }}" method="POST" id="contact_form">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="email" class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="email" name="email"  placeholder="Enter your email">

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="control-label col-md-3">Password:</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-9 offset-md-3">
                                                                <button class="btn btn-primary" type="submit">Login</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-9 offset-md-3">
                                                                <a href="{{ route('password.request')  }}" >Forgot Password</a>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <a class="btn btn-danger btn-block" href="#" > <i class="fa fa-google"></i> Login With Google</a>
                                                                <a class="btn btn-primary btn-block" href="#"> <i class="fa fa-facebook-square"></i>  Login With Facebook</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-heading text-center">Register</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{  url('/register')  }}" id="signup_form" method="POST">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="signup_name" class="control-label col-md-3 ">Full Name:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="signup_name"  value="{{ old('name')  }}" name="name" placeholder="Enter your full name">
                                                                @error('name')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="signup_email" class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control @error('email') is-invalid @enderror " id="signup_email" value="{{ old('email')  }}" name="email" placeholder="Enter your email">
                                                                @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="control-label col-md-3">Phone:</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone')  }}" name="phone" placeholder="Enter your phone">
                                                                @error('phone')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="signup_password" class="control-label col-md-3">Password:</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control @error('password') is-invalid @enderror " id="signup_password" name="password" placeholder="Enter your password">
                                                                @error('password')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password_confirmation" class="control-label col-md-3">Confirm Password:</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " id="password_confirmation" name="password_confirmation" placeholder="Re-Enter your password">
                                                                @error('password_confirmatio')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-9 offset-md-3">
                                                                <button class="btn btn-primary" type="submit">Sign Up</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <a class="btn btn-danger btn-block"  href="#"><i class="fa fa-google"></i> Sign-Up With Google</a>
                                                                <a class="btn btn-primary btn-block" href="#"> <i class="fa fa-facebook-square"></i>Sign-Up With Facebook</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel"></div>
                            </div>

                        </div>
                    </div>
            </div><!--/ content wrapper -->
        </div><!--/ wrapper -->
@endsection
