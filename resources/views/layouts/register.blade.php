@extends('layouts.admin.auth_master')

@section('title')Register
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
@endpush

@section('content')
    <section>
	    <div class="container-fluid p-0">
	        <div class="row m-0">
	            <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/1.jpg') }}" alt="looginpage" /></div>
	            <div class="col-xl-5 p-0">
	                <div class="login-card">
	                    <form class="theme-form login-form" action="{{ route('register.perform') }}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	                        <h4>Create your account</h4>
	                        <h6>Enter your personal details to create account</h6>
	                        {{-- <div class="form-group">
	                            <label>Your Name</label>
	                            <div class="small-group">
	                                <div class="input-group">
	                                    <span class="input-group-text"><i class="icon-user"></i></span>
	                                    <input class="form-control" type="email" required="" placeholder="First Name" />
	                                </div>
	                                <div class="input-group">
	                                    <span class="input-group-text"><i class="icon-user"></i></span>
	                                    <input class="form-control" type="email" required="" placeholder="Last Name" />
	                                </div>
	                            </div>
	                        </div> --}}
							<div class="form-group">
	                            <label>Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control" type="email" required="" placeholder="Test@gmail.com" name="email" value="{{ old('email') }}" autofocus/>
									<br>
									@if ($errors->has('email'))
										<span class="text-danger text-left">{{ $errors->first('email') }}</span>
									@endif
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Username</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-user"></i></span>
	                                <input class="form-control" type="text" required="" placeholder="Username" name="username" value="{{ old('username') }}" autofocus/>
									<br>
									@if ($errors->has('username'))
										<span class="text-danger text-left">{{ $errors->first('username') }}</span>
									@endif
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control" type="password" required="" placeholder="*********" name="password" value="{{ old('password') }}"/>
	                                <div class="show-hide"><span class="show"> </span></div>
									<br>
									@if ($errors->has('password'))
										<span class="text-danger text-left">{{ $errors->first('password') }}</span>
									@endif
	                            </div>
	                        </div>
							<div class="form-group">
	                            <label>Confirm Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control" type="password" required="" placeholder="*********" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
	                                <div class="show-hide-repeat"><span class="show"> </span></div>
									<br>
									@if ($errors->has('password_confirmation'))
										<span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
									@endif
	                            </div>
	                        </div>
	                        
	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
	                        </div>
	                        <div class="login-social-title">
	                            <h5>Have a account ?</h5>
	                        </div>
	                       
	                        <p>Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>


    @push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    @endpush

@endsection