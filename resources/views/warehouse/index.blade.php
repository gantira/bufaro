@extends('layouts.app')

@section('title' , 'Warehouse')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Input</h3>
      </div>
      <form action="{{ route('warehouse.store') }}" role="form" method="post">
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="Kode">Kode</label>
            <input name="code" id="Kode" type="text" class="form-control" placeholder="Kode Warehouse" value="{{ old('code') }}">
          </div>
          <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="name" id="Nama" type="text" class="form-control" placeholder="Nama Warehouse" value="{{ old('name') }}">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Tabel Warehouse</h3>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Kode</th>
              <th>Nama Warehouse</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($warehouse as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->code }}</td>
              <td>{{ $row->name }}</td>
              <td>
                <a href="{{ route('warehouse.edit', $row->id) }}">
                  <button class="btn btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                </a>
                <a href="javascript:;" onclick="event.preventDefault();getElementById('hapus{{$row->id}}').submit();">
                  <button class="btn btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>

                  <form action="{{ route('warehouse.destroy', $row->id) }}" method="post" id="hapus{{$row->id}}">
                    @csrf
                    @method('delete')
                  </form>
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection