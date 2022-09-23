@extends('layouts.admin.master')

@section('title')Asset Management
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-extension.css')}}">
<style>
  .btn-modif {
      text-transform: capitalize !important;
      font-weight: 600 !important;
      font-size: 12px !important;
      white-space: normal !important;
      padding: 0.2rem !important;
  }

  th.th-modif {
      padding: 0rem !important;
  }

  .dataTables_wrapper .dataTables_processing {
      position: fixed;
      top: 50%;
      left: 50%;
      width: 250px;
      height: 85px;
      margin-bottom: 20px;
      background-color: #ffffff;
      border: 2px solid #f49b15;
      border-radius: 4px;
      margin-left: -100px;
      margin-top: -26px;
      text-align: center;
      padding: 1em 0;
      z-index: 1;
  }

  .span_selected {
      top: 2px;
      left: 7px;
      box-sizing: border-box;
      width: 6px;
      height: 12px;
      border-width: 2px;
      border-style: solid;
      border-color: #fff;
      border-top: 0;
      border-left: 0;
      position: absolute;
      display: none;
      content: '';
  }

</style>
@endpush

@section('content')
  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Asset Management</h3>
    @endslot
    <li class="breadcrumb-item active">Asset Management</li>
  @endcomponent
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Daftar Assets</h5><span>Berikut daftar barang pada department IT.</span>
            <br>
            <a href="{{ route('assets.main.create') }}" class="btn btn-success btn-sm" type="button"><i class="icon-plus"></i> Tambah</a>
            <a href="{{ route('assets.main.export') }}" class="btn btn-info btn-sm" type="button"><i class="icofont icofont-file-excel"></i> Export</a>
            <form action="{{ route('assets.main.multiple') }}" id="massApproval" method="GET" class="mt-3">
              @csrf
              <input type="hidden" name="asset_id" id="asset_id">
              <button class="btn btn-warning btn-sm" type="submit"><i class="icofont icofont-file-pdf"></i> Print QR</button>
            </form>
            <div id="showSelected"></div>
          </div>
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table class="display" id="dataTables">
                <thead>
                  <tr>
                    <th class="th-modif"><input type="button" id="checkAll" value="Select All"
                      class="btn btn-modif btn-success" /></th>
                    <th width="600px">Nama Barang</th>
                    <th>Nomor Aset</th>
                    <th>Service Tag</th>
                    <th>Garansi</th>
                    <th>Quantity</th>
                    <th>Kategori</th>
                    <th>Tanggal Order</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-modif"><input type="button" id="checkAll" value="Select All"
                      class="btn btn-modif btn-success" /></th>
                    <th width="600px">Nama Barang</th>
                    <th>Nomor Aset</th>
                    <th>Service Tag</th>
                    <th>Garansi</th>
                    <th>Quantity</th>
                    <th>Kategori</th>
                    <th>Tanggal Order</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Status</th>
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
    function clearArray(array) {
            while (array.length) {
                array.pop();
            }
        }

    $(document).ready(function() {
        var rows_selected = [];
        var alertCount = 0;
        

        var table = $('#dataTables').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('assets.main.datatables') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'product_name', name: 'product_name'},
                {data: 'asset_number', name: 'asset_number'},
                {data: 'service_tag', name: 'service_tag'},
                {data: 'warranty', name: 'warranty'},
                {data: 'quantity', name: 'quantity'},
                {data: 'category', name: 'categories.name'},
                {data: 'purchase_date', name: 'purchase_date'},
                {data: 'employee', name: 'users.name'},
                {data: 'created_at', name: 'created_at', orderable: false},
                {data: 'status', name: 'status', searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            'columnDefs': [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'width': '1%',
                    'className': 'text-center',
                    'render': function(data, type, full, meta) {
                        return '<input type="checkbox" class="checkbox asset_id" value="' +
                            data + '" ><label></label>';
                    }
                }],
                'rowCallback': function(row, data, dataIndex) {
                    var rowId = data['id'];
                    if ($.inArray(rowId, rows_selected) !== -1) {
                        $(row).find('input[type="checkbox"]').prop('checked', true);
                        $(row).addClass('selected');
                    }
                },
        });

        $("#checkAll").on('click', function(e) {
                e.preventDefault();
                console.log('jalan');
                if ($("#checkAll").val() === "Select All") {
                    table.column(0).nodes().to$().each(function(index) {
                        var checkbox = $(this).find('.asset_id');
                        checkbox[0].setAttribute("checked", "checked");
                        var data = checkbox[0];
                        var rowId = data['value'];
                        rows_selected.push(rowId);
                    });
                    console.log(rows_selected);
                    $("#checkAll").val("Deselect All");
                    $("#checkAll").removeClass("btn-success").addClass("btn-danger");
                    $('#showSelected').text('');
                    $('#showSelected').text('Data Selected : ' + rows_selected.length);
                } else {
                    table.column(0).nodes().to$().each(function(index) {
                        var checkBox = $(this).find('.asset_id');
                        checkBox[0].removeAttribute("checked");
                    });
                    clearArray(rows_selected);
                    console.log(rows_selected);
                    $("#checkAll").val("Select All");
                    $("#checkAll").removeClass("btn-danger").addClass("btn-success");
                    $('#showSelected').text('');
                }
            });

            $('#dataTables tbody').on('click', 'input[type="checkbox"]', function(e) {
                var $row = $(this).closest('tr');
                var data = table.row($row).data();
                var rowId = data['id'];
                var index = $.inArray(rowId, rows_selected);
                if (this.checked && index === -1) {
                    rows_selected.push(rowId);
                } else if (!this.checked && index !== -1) {
                    rows_selected.splice(index, 1);
                }
                if (this.checked) {
                    $row.addClass('selected');
                } else {
                    $row.removeClass('selected');
                }
                $('#showSelected').text('');
                $('#showSelected').text('Data Selected:' + rows_selected.length);
                console.log(rows_selected);
                e.stopPropagation();
            });

            $('#dataTables').on('click', 'tbody td, thead th:first-child', function(e) {
                $(this).parent().find('input[type="checkbox"]').trigger('click');
            });

            $('#massApproval').on('submit', function(e) {
                var form = this;
                var arr_id = [];

                $.each(rows_selected, function(index, rowId) {
                    arr_id.push(rowId);
                });
                if (arr_id.length === 0) {
                  swal({
                      text: "Belum ada yang di centang bro : ",
                      icon: "error",
                      buttons: ['OK'],
                      dangerMode: true
                    });
                    return false;
                } else {
                    if (arr_id.length > 26) {
                        swal({
                          text: "Maksimal 25 nih : ",
                          icon: "error",
                          buttons: ['OK'],
                          dangerMode: true
                        });
                        return false;
                    } else {
                        var id = arr_id;
                        $('input[name="asset_id"]').val(id);
                        console.log($('#asset_id').val());
                    }
                }
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