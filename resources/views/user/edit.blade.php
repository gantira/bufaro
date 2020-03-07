@extends('layouts.app')

@section('title' , 'User')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Input Form</h3>
      </div>
      <form action="{{ route('user.update', $user->id) }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
          <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="name" id="Nama" type="text" class="form-control" placeholder="Nama User" value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input name="email" id="Email" type="email" class="form-control" placeholder="Email User" value="{{ $user->email }}">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input name="password" id="Password" type="password" class="form-control" placeholder="Password User">
          </div>
          <div class="form-group">
            <label for="Confirm Password">Confirm Password</label>
            <input name="password_confirmation" id="Confirm Password" type="password" class="form-control" placeholder="Confirm Password User">
          </div>
          <div class="form-group">
            <label for="Nama">Role</label>
            <select name="role" class="form-control select2bs4" style="width: 100%;">
              @foreach($roleOptions as $row)
              <option value="{{ $row->id }}" {{ in_array($row->name, $user->getRoleNames()->toArray()) ? 'selected' : '' }}>{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Image">Image</label>
            @if ($user->image)
            <img src="{{ asset('uploads/' . $user->image) }}" alt="{{ $user->image }}" class="img-fluid my-1">
            @endif
            <input name="image" id="Image" type="file" class="form-control-file" placeholder="Image User">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  @endsection