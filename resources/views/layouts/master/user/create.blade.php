@extends('layouts.admin.master')

@section('title')User
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>User</h3>
		@endslot
        <li class="breadcrumb-item active">Add</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Add User</h5>
					</div>
					<form class="form theme-form" action="{{ route('master.user.store') }}" method="POST">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama User</label>
										<input class="form-control" id="exampleFormControlInput1" type="text" name="name" placeholder="Nama user" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Email</label>
										<input class="form-control" id="exampleFormControlInput1" type="email" name="email" placeholder="Email user" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-4">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Username</label>
										<input class="form-control" id="exampleFormControlInput1" type="text" name="username_evin" placeholder="Username" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Password</label>
										<input class="form-control" id="exampleFormControlInput1" type="password" name="password_evin" placeholder="**********" required/>
									</div>
								</div>
							</div>
							
						</div>
						<div class="card-footer text-end">
							<button class="btn btn-primary" type="submit">Submit</button>
							<input class="btn btn-light" type="reset" value="Cancel" />
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection