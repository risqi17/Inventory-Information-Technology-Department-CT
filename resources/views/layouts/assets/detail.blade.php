@extends('layouts.admin.master')

@section('title')Asset Detail
 {{ $title }}
@endsection

@push('css')

@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Asset Transaction History</h3>
		@endslot
        <li class="breadcrumb-item active">Detail</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>{{ $asset }}</h5>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection