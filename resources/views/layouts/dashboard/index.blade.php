@extends('layouts.admin.master')

@section('title')Dashboard
 {{ $title }}
@endsection

@push('breadcrumb')
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">Dashboard</li>
@endpush

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vector-map.css')}}">
@endpush
    @section('content')
      @yield('breadcrumb-list')
      <!-- Container-fluid starts-->
      <div class="container-fluid dashboard-default-sec">
        <div class="row">
          <div class="col-xl-5 box-col-12 des-xl-100">
            <div class="row">
              <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                <div class="card income-card card-primary">
                  <div class="card-body text-center">
                    <div class="round-box">
                      <i class="icofont icofont-qr-code"></i>
                    </div>
                    <h5></h5><br>
                    <p>Scan QR</p><a class="btn-arrow arrow-primary" href="{{ route('dashboard.scan') }}"><button class="btn btn-pill btn-primary btn-sm" type="button">Scan</button></a>
                    <div class="parrten">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z">                                  </path>
                          </g>
                        </g>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid Ends-->
    @push('scripts')
      <script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
      <script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
      <script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
      <script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
      <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
      <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
      <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
      <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
      <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
      <script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/default.js')}}"></script>
      <script src="{{asset('assets/js/notify/index.js')}}"></script>
      <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
      <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
      <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
      
    @endpush
@endsection
