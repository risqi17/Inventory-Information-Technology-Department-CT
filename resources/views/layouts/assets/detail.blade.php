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
			<div class="col-xl-12 col-50 box-col-12 des-xl-50">
                <div class="card latest-update-sec">
                  <div class="card-header">
                    <div class="header-top d-sm-flex align-items-center">
                      <h5>[ {{ $asset->asset_number }} ] {{ $asset->product_name }}</h5>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordernone">
                        <tbody>
                         @foreach ($transaction as $item)
							<tr>
								<td width="400px">
									<div class="media">
										@if ($item->type == "CHECKOUT")
											<i class="icofont icofont-hand-drawn-up"></i>
										@else
											<i class="icofont icofont-hand-drawn-down"></i>
										@endif
										<div class="media-body"><span>[ {{$item->department}} ] {{ $item->user }}</span>
											<p>@if ($item->type == "CHECKOUT")
												<strong>[ Check out ]</strong>
											@else
												<strong>[ Check in ]</strong>
											@endif {{ dateTextMySQL2ID($item->tanggal) }}</p>
										</div>
									</div>
								</td>
							
							</tr>
						 @endforeach
                          

                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
              </div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-50 box-col-12 des-xl-50">
                <div class="card latest-update-sec">
                  <div class="card-header">
                    <div class="header-top d-sm-flex align-items-center">
                     
                    </div>
                  </div>
                  <div class="card-body">
					<div class="row">
						{!! QrCode::size(150)->generate($asset->uuid); !!}
					</div>
                    <div class="table-responsive mt-5">
                      <table class="table table-bordernone">
                        <tbody>
							<tr>
								<td>
									<h6>[ {{ $asset->asset_number }} ] {{ $asset->product_name }}</h6>
								</td>
							</tr>
							<tr>
								<td>
									<h6>Service Tag : {{ $asset->service_tag }}</h6>
								</td>
							</tr>
							<tr>
								<td>
									<h6>Garansi : {{ $asset->warranty }} Bulan</h6>
								</td>
							</tr>
							<tr>
								<td>
									<h6>Purchase Date : {{ dateTextMySQL2ID($asset->purchase_date) }}</h6>
								</td>
							</tr>
							<tr>
								<td>
									<img src="{{ asset('assets/images/assets') }}/{{ $asset->image }}" alt="" width="300px">
								</td>
							</tr>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
              </div>
		</div>
	</div>
	
	
	@push('scripts')
	@endpush

@endsection