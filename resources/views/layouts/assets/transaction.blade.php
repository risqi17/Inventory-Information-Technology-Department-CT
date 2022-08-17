@extends('layouts.admin.master')

@section('title')Asset
 {{ $title }}
@endsection

@push('css')

@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Asset Management</h3>
		@endslot
        <li class="breadcrumb-item active">Check Out</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Check Out Asset</h5>
					</div>
					<form class="form theme-form" action="{{ route('assets.main.checkout.process') }}" method="POST">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama Barang</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="product" readonly value="{{ $asset->product_name }}" required/>
                                        <input class="form-control" id="exampleFormControlInput1" type="hidden" name="id" value="{{ $asset->id }}" required/>
									</div>
								</div>
							</div>
                          
                            <div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nomor Asset</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="number" value="{{ $asset->asset_number }}" readonly required/>
                                    </div>
								</div>
							</div>
                            
                            <div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Department</label>
										{!! Form::select('department', $department ,null, ['class' => 'js-example-basic-single', 'required' => '']) !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama Pengguna</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="user" autofocus required/>
                                    </div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Check Out Date</label>
										<input class="datepicker-here form-control digits" type="text" name="checkout_date" data-language="en" required/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer text-end">
							<button class="btn btn-primary" type="submit">Submit</button>
							<a href="{{ route('assets.main.index') }}" class="btn btn-light" type="reset">Cancel</a>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection