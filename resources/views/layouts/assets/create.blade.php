@extends('layouts.admin.master')

@section('title')Asset
 {{ $title }}
@endsection

@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css') }}">
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Asset Management</h3>
		@endslot
        <li class="breadcrumb-item active">Add</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Add Asset</h5>
					</div>
					<form class="form theme-form" action="{{ route('assets.main.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama Barang</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="product" autofocus required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Jumlah Barang</label>
										<input class="form-control" id="exampleFormControlInput1" type="number" name="quantity" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nomor Asset</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="number" required/>
                                    </div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Service Tag</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="service" required/>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-12">
									<label class="form-label" for="exampleFormControlInput1">Spesifikasi</label>
                                    <textarea id="editable" name="specification" placeholder="Spesifikasi tulis disini"></textarea>
                                </div>
                            </div>
							<div class="row mt-3">
                                <div class="col-sm-6">
									<label class="form-label" for="exampleFormControlInput1">Photo</label>
									<input class="form-control" type="file" name="file" accept="image/*" required/>
                                </div>
                            </div>
							<div class="row mt-3">
								<div class="col-sm-6">
									<label class="col-form-label">Parameter Kondisi</label>
									<select class="js-example-placeholder-multiple col-sm-12" name="condition[]"  multiple="multiple">
										@foreach ($condition as $item)
											<option value="{{ $item }}">{{ $item }}</option>
										@endforeach
									</select>
								</div>
							</div>
                            <div class="row mt-3">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Kategori</label>
										{!! Form::select('category', $category ,null, ['class' => 'js-example-basic-single', 'required' => '']) !!}
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Tanggal Order (Purchase Date)</label>
										<input class="datepicker-here form-control digits" type="text" name="purchase_date" data-language="en" required/>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Garansi</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="warranty" placeholder="Garansi dalam bulan" aria-label="Garansi dalam bulan"><span class="input-group-text">Bulan</span>
                                          </div>
                                    </div>
								</div>
							</div>

                            <div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Status</label>
                                        <select name="status" class="js-example-basic-single" required>
                                            <option value="1">Ready to deploy</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Broken</option>
                                        </select>
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
	<script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>

	<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
	@endpush

@endsection