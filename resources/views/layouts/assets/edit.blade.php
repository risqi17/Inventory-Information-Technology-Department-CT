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
        <li class="breadcrumb-item active">Edit</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Add Asset</h5>
					</div>
                    {!! Form::model($asset, [
                            'route' => ['assets.main.update', $asset->id],
                            'method' => 'put', 
                            'files' => true
                        ])
                    !!}
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama Barang</label>
                                        <input type="hidden" name="id" value="{{ $asset->id }}">
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="product" value="{{ $asset->product_name }}" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Jumlah Barang</label>
										<input class="form-control" id="exampleFormControlInput1" type="number" name="quantity" value="{{ $asset->quantity }}" required/>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nomor Asset</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="number" value="{{ $asset->asset_number }}"  required/>
                                    </div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-9">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Service Tag</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="service" value="{{ $asset->service_tag }}"  required/>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-12">
									<label class="form-label" for="exampleFormControlInput1">Spesifikasi</label>
                                    <textarea id="editable" name="specification" placeholder="Spesifikasi tulis disini">{{ $asset->specification }}</textarea>
                                </div>
                            </div>
                            <div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Kategori</label>
                                        <select class="js-example-basic-single" name="category">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" @if ($asset->category_id == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Tanggal Order (Purchase Date)</label>
										<input class="datepicker-here form-control digits" type="text" name="purchase_date" value="{{ $asset->purchase_date }}" data-language="en" required/>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Garansi</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="warranty" placeholder="Garansi dalam bulan" value="{{ $asset->warranty }}" aria-label="Garansi dalam bulan"><span class="input-group-text">Bulan</span>
                                          </div>
                                    </div>
								</div>
							</div>

                            <div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Status</label>
                                        <select name="status" class="js-example-basic-single" required>
                                            <option value="1" @if ($asset->status == 1) Selected @endif>Ready to deploy</option>
                                            <option value="2" @if ($asset->status == 2) Selected @endif>Pending</option>
                                            <option value="3" @if ($asset->status == 3) Selected @endif>Broken</option>
                                        </select>
									</div>
								</div>
							</div>
							
						</div>
						<div class="card-footer text-end">
							<button class="btn btn-primary" type="submit">Submit</button>
							<a href="{{ route('assets.main.index') }}" class="btn btn-light" type="reset">Cancel</a>
						</div>
                        {!! Form::close() !!}
				</div>
				
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection