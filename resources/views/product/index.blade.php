@extends('layouts.app')

@section('title' , 'Product')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default card-outline">
      <div class="card-header">
        <h3 class="card-title">
          <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
            <span class="fas fa-plus-circle"></span> Tambah
          </a>
        </h3>
        <div class="card-tools">
          <form action="{{ route('product.index') }}" method="get">
            <div class="input-group" style="width: 200px;">
              <input type="text" name="q" class="form-control" placeholder="Cari" value="{{ request()->q }}">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>

        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Product</th>
              <th>Jenis</th>
              <th>Warna</th>
              <th>Size</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse($product as $key => $row)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $row->code_label }}</td>
              <td>{{ $row->type->name }}</td>
              <td>{{ $row->colour->name }}</td>
              <td>{{ $row->size->name }}</td>
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('product.edit', $row->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  <a href="javascript:;" onclick="event.preventDefault();getElementById('hapus{{$row->id}}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  <form action="{{ route('product.destroy', $row->id) }}" method="post" id="hapus{{$row->id}}">
                    @csrf
                    @method('delete')
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="card-footer clearfix">
          <!-- {{ $product->links() }} -->
        </div>
      </div>
    </div>
  </div>
  @endsection