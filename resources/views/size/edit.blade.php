@extends('layouts.app')

@section('title' , 'Size')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Input Form</h3>
      </div>
      <form role="form" action="{{ route('size.update', $size->id) }}" method="post">
        @csrf
        @method('put')

        <div class="card-body">
          <div class="form-group">
            <label for="Kode">Kode</label>
            <input name="code" type="text" id="Kode" class="form-control" placeholder="Kode Size" value="{{ $size->code }}">
          </div>
          <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="name" type="text" id="Nama" class="form-control" placeholder="Nama Size" value="{{ $size->name }}">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  @endsection