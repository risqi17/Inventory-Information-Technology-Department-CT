@extends('layouts.admin.master')

@section('title')Category
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-extension.css')}}">
@endpush

@section('content')
  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Master</h3>
    @endslot
    <li class="breadcrumb-item active">Category</li>
  @endcomponent
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Daftar Category</h5><span>Berikut daftar barang category pada department IT.</span>
            <br>
            <a href="{{ route('master.category.create') }}" class="btn btn-success btn-sm" type="button"><i class="icon-plus"></i> Tambah</a>
            {{-- <button class="btn btn-success btn-sm sweet-1" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);" type="button">test</button> --}}
          </div>
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table  class="display" id="responsive">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th width="150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
                
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
  <script src="{{ asset('assets/js/height-equal.js') }}"></script>
  <script>
    $(document).ready(function() {
        $('#responsive').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('master.category.datatables') }}',
            columns: [
                {data: 'name', name: 'name'},
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