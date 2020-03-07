@extends('layouts.app')

@section('title' , 'Permission')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Input Form</h3>
      </div>
      <form role="form" action="{{ route('permission.update', $permission->id) }}" method="post">
        @csrf
        @method('put')

        <div class="card-body">
          <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="name" type="text" id="Nama" class="form-control" placeholder="Nama Permission" value="{{ $permission->name }}">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  @endsection