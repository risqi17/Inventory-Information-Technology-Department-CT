@extends('layouts.admin.master')

@section('title')Product
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Product</h3>
		@endslot
        <li class="breadcrumb-item active">Edit</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Edit Product</h5>
					</div>
                    {!! Form::model($user, [
                            'route' => ['master.user.update', $user->id],
                            'method' => 'put', 
                            'files' => true
                        ])
                    !!}
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama User</label>
										{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nama user', 'required' => '']) !!}

                                        <p class="help-block"></p>
                                        @if($errors->has('name'))
                                            <p class="help-block">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Email</label>
										{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email', 'required' => '']) !!}

                                        <p class="help-block"></p>
                                        @if($errors->has('email'))
                                            <p class="help-block">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Username</label>
										{!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '']) !!}

                                        <p class="help-block"></p>
                                        @if($errors->has('username'))
                                            <p class="help-block">
                                                {{ $errors->first('username') }}
                                            </p>
                                        @endif
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Password (* Kosongi jika password tidak ingin diubah)</label>
										<input class="form-control" id="exampleFormControlInput1" type="password" name="password" placeholder="Kosongkan jika password tidak diubah"/>

                                        <p class="help-block"></p>
                                        @if($errors->has('password'))
                                            <p class="help-block">
                                                {{ $errors->first('password') }}
                                            </p>
                                        @endif
									</div>
								</div>
							</div>
                            
							
						</div>
						<div class="card-footer text-end">
							<button class="btn btn-primary" type="submit">Submit</button>
							<a href="{{ route('master.product.index') }}" class="btn btn-light" type="reset">Cancel</a>
						</div>
                        {!! Form::close() !!}
				</div>
				
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection