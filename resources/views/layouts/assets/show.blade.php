@extends('layouts.admin.master')

@section('title')Asset Management
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-extension.css')}}">
@endpush

@section('content')
  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Asset Management</h3>
    @endslot
    <li class="breadcrumb-item active">Asset Management</li>
  @endcomponent
  
  <div class="container-fluid">
    <div class="col-sm-12 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>{{ $asset->product_name }}</h5>
                <span>{{ $asset->asset_number }}</span>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-warninghome-tab" data-bs-toggle="pill" href="#pills-warninghome" role="tab" aria-controls="pills-warninghome" aria-selected="true">
                            <i class="icofont icofont-box"></i>Detail
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="pills-warningprofile-tab" data-bs-toggle="pill" href="#pills-warningprofile" role="tab" aria-controls="pills-warningprofile" aria-selected="false">
                            <i class="icofont icofont-man-in-glasses"></i>Profile
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" id="pills-warningcontact-tab" data-bs-toggle="pill" href="#pills-warningcontact" role="tab" aria-controls="pills-warningcontact" aria-selected="false">
                            <i class="icofont icofont-spinner-alt-3"></i>History
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-warningtabContent">
                    <div class="tab-pane fade show active" id="pills-warninghome" role="tabpanel" aria-labelledby="pills-warninghome-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5>Detail Asset</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="table-responsive">
                                            <table class="display">
                                               
                                                <tbody>
                                                        <tr>
                                                            <td width="200px">Product Name</td>
                                                            <td>: {{ $asset->product_name }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Asset Number</td>
                                                            <td>: {{ $asset->asset_number }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Service Tag</td>
                                                            <td>: {{ $asset->service_tag }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Quantity</td>
                                                            <td>: {{ $asset->quantity }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Specification</td>
                                                            <td>: {{ $asset->specification }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Category</td>
                                                            <td>: {{ $asset->category }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Purchase Date</td>
                                                            <td>: {{ $asset->purchase_date }}</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Warranty</td>
                                                            <td>: {{ $asset->warranty }} Bulan</td>
                                                        </tr>  
                                                        <tr>
                                                            <td width="200px">Status</td>
                                                            <td>:   @if ($asset->status == 1)
                                                                        <span class="badge badge-primary">Ready to deploy</span>
                                                                    @elseif($asset->status == 2)
                                                                        <span class="badge badge-warning text-dark">Pending</span>
                                                                    @elseif($asset->status == 3)
                                                                        <span class="badge badge-info">Broken</span>
                                                                    @elseif($asset->status == 4)
                                                                        <span class="badge badge-danger">In Used</span>
                                                                    @else
                                                                        -
                                                                    @endif
                                                            </td>
                                                        </tr>  
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        {!! QrCode::size(150)->generate($asset->uuid); !!}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-warningcontact" role="tabpanel" aria-labelledby="pills-warningcontact-tab">
                        
                            <div class="card">
                                <div class="card-header">
                                    <h5>History Transaction</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="display" id="basic-1">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Date</th>
                                                    <th>Pengguna</th>
                                                    <th>Departemen</th>
                                                    <th>Type</th>
                                                    <th>Created By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaction as $item)
                                                    <tr>
                                                        <td>{{ $item->transaction_date }}</td>
                                                        <td>{{ $item->user }}</td>
                                                        <td>{{ $item->department }}</td>
                                                        <td>
                                                            @if ($item->type == "CHECKOUT")
                                                                <span class="badge badge-danger">Check Out</span>
                                                            @else
                                                                <span class="badge badge-success">Check In</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->employee }}</td>
                                                    </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
  <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
  <script>
    $(document).ready(function() {
        $('#basic-1').DataTable({
            "order": [[ 0, "DESC" ]]
        });
    });
      
    function printExternal(url) {
            var printWindow = window.open(url, 'Print', 'left=200, top=200, width=950, height=800, toolbar=0, resizable=0');
            printWindow.addEventListener('load', function() {
                printWindow.print();
            }, true);
        }
    </script>
  @endpush

@endsection