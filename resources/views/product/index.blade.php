@extends('layouts.app')

@section('title' , 'Product')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">

      <div class="card-body">
        <div class="mb-2">
          <div id="tools-button"></div>
        </div>
        <b></b>
        <table id="example" class="table table-hover table-striped  ">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Product</th>
              <th>Jenis</th>
              <th>Warna</th>
              <th>Size</th>
              <th>Penyimpanan</th>
              <th>Stock</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $key => $row)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $row->code_label }}</td>
              <td>{{ $row->type->name }}</td>
              <td>{{ $row->colour->name }}</td>
              <td>{{ $row->size->name }}</td>
              <td>{{ $row->warehouse->name }}</td>
              <td>{{ $row->stock }}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('product.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  <a href="javascript:;" onclick="confirm('Data yang bersangkutan akan terhapus?\nKamu Yakin?');event.preventDefault();getElementById('hapus{{$row->id}}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  <form action="{{ route('product.destroy', $row->id) }}" method="post" id="hapus{{$row->id}}">
                    @csrf
                    @method('delete')
                  </form>
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
@endsection

@push('js')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(document).ready(function() {
    var table = $('#example').DataTable({
      buttons: [{
        extend: 'copy',
        text: '<i class="fas fa-copy"></i> Copy',
        titleAttr: 'Copy'
      }, {
        extend: 'excel',
        text: '<i class="fas fa-file-excel"></i> Excel',
        titleAttr: 'excel'
      }, {
        extend: 'print',
        text: '<i class="fas fa-print"></i> Print',
        titleAttr: 'Print'
      }, {
        text: '<i class="fas fa-plus-circle"></i> Tambah',
        titleAttr: 'Tambah',
        action: function(e, dt, node, config) {
          window.location = `{{ route('product.create') }}`
        }
      }, ]
    });

    table.buttons().container().appendTo($('#tools-button'));


  });
</script>
@endpush