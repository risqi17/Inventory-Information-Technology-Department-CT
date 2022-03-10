@extends('layouts.admin.auth_master')

@section('title')login
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    <section>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/2.jpg') }}" alt="looginpage" /></div>
	            <div class="col-xl-5 p-0">
	                <div class="login-card">
						
	                    <form class="theme-form login-form" method="POST" action="{{ route('login.perform') }}">
							@include('layouts.partials.messages')
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	                        <h4>Login</h4>
	                        <h6>Welcome back! Log in to your account.</h6>
	                        <div class="form-group">
	                            <label>Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control" type="text" required="" placeholder="Username" name="username"/>
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
	                                <input class="form-control" type="password" name="password" required="" placeholder="*********" />
	                                <div class="show-hide"><span class="show"> </span></div>
									@if ($errors->has('password'))
										<span class="text-danger text-left">{{ $errors->first('password') }}</span>
									@endif
	                            </div>
	                        </div>
	                        {{-- <div class="form-group">
	                            <div class="checkbox">
	                                <input id="checkbox1" type="checkbox" />
	                                <label class="text-muted" for="checkbox1">Remember password</label>
	                            </div>
	                            <a class="link" href="">Forgot password?</a>
	                        </div> --}}
	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
	                        </div>
	                        <div class="login-social-title">
	                            <h5>Let's Come In</h5>
	                        </div>
	                        
	                        <p>Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	
    @push('scripts')
    @endpush

@endsection