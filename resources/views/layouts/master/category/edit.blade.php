@extends('layouts.admin.master')

@section('title')Category
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Category</h3>
		@endslot
        <li class="breadcrumb-item active">Edit</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Edit Category</h5>
					</div>
                    {!! Form::model($category, [
                            'route' => ['master.category.update', $category->id],
                            'method' => 'put', 
                            'files' => true
                        ])
                    !!}
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-sm-5">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlInput1">Nama Kategori</label>
										{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
								<div class="col-sm-4">
									<div class="mb-3">
										<label class="form-label" for="exampleInputPassword2">Description</label>
                                        {!! Form::textarea('desc', old('desc'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'rows' => '3']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('name'))
                                            <p class="help-block">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
									</div>
								</div>
							</div>
							
						</div>
						<div class="card-footer text-end">
							<button class="btn btn-primary" type="submit">Submit</button>
							<a href="{{ route('master.category.index') }}" class="btn btn-light" type="reset">Cancel</a>
						</div>
                        {!! Form::close() !!}
				</div>
				
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection