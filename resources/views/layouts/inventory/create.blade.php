@extends('layouts.admin.master')

@section('title')Inventory
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Inventory</h3>
		@endslot
        <li class="breadcrumb-item active">Add</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Add Inventory</h5>
					</div>
					<form class="form theme-form" action="{{ route('inventory.main.store') }}" method="POST">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama Barang</label>
										{!! Form::select('product', $product ,null, ['class' => 'js-example-basic-single', 'required' => '']) !!}
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Jumlah Barang</label>
										<input class="form-control" id="exampleFormControlInput1" type="number" name="quantity" value="1" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Departemen Peruntukan</label>
										{!! Form::select('department', $department ,null, ['class' => 'js-example-basic-single', 'required' => '']) !!}
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Tanggal Masuk</label>
										<input class="datepicker-here form-control digits" type="text" name="date_in" data-language="en" required/>
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