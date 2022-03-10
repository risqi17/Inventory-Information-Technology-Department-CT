@extends('layouts.admin.master')

@section('title')Product
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-extension.css')}}">
@endpush

@section('content')
  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Products</h3>
    @endslot
    <li class="breadcrumb-item active">Products</li>
  @endcomponent
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Daftar Products</h5><span>Berikut daftar barang pada department IT.</span>
            <br>
            <a href="{{ route('master.product.create') }}" class="btn btn-success btn-sm" type="button"><i class="icon-plus"></i> Tambah</a>
          </div>
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table class="display" id="responsive">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Kategory</th>
                    <th>Deskripsi</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Kategory</th>
                    <th>Deskripsi</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
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
        $('#responsive').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('master.product.datatables') }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'category', name: 'category', searchable: false},
                {data: 'desc', name: 'desc', searchable: false},
                {data: 'employee', name: 'employee', searchable: false},
                {data: 'created_at', name: 'created_at', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
      
    </script>
  @endpush

@endsection