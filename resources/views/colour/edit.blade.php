@extends('layouts.app')

@section('title' , 'Warna')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Input Form</h3>
      </div>
      <form role="form" action="{{ route('colour.update', $colour->id) }}" method="post">
        @csrf
        @method('put')

        <div class="card-body">
          <div class="form-group">
            <label for="Kode">Kode</label>
            <input name="code" type="text" id="Kode" class="form-control" placeholder="Kode Warna" value="{{ $colour->code }}">
          </div>
          <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="name" type="text" id="Nama" class="form-control" placeholder="Nama Warna" value="{{ $colour->name }}">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  @endsection