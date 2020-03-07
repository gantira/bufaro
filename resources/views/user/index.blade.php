@extends('layouts.app')

@section('title' , 'User')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Input</h3>
      </div>
      <form action="{{ route('user.store') }}" role="form" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="Nama">Nama</label>
            <input name="name" id="Nama" type="text" class="form-control" placeholder="Nama User" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input name="email" id="Email" type="email" class="form-control" placeholder="Email User" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input name="password" id="Password" type="password" class="form-control" placeholder="Password User" value="{{ old('password') }}">
          </div>
          <div class="form-group">
            <label for="Confirm Password">Confirm Password</label>
            <input name="password_confirmation" id="Confirm Password" type="password" class="form-control" placeholder="Confirm Password User" value="{{ old('password_confirmation') }}">
          </div>
          <div class="form-group">
            <label for="Nama">Role</label>
            <select name="role" class="form-control select2bs4" style="width: 100%;">
              @foreach($roleOptions as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Image">Image</label>
            <input name="image" id="Image" type="file" class="form-control-file" placeholder="Confirm Password User" value="{{ old('image') }}">
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
        <h3 class="card-title">Tabel User</h3>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($user as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->name }}(<b>{{ $row->email }}</b>)</td>
              <td>{{ implode(',', $row->getRoleNames()->toArray()) }}</td>
              <td>
                <a href="{{ route('user.edit', $row->id) }}">
                  <button class="btn btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                </a>
                <a href="javascript:;" onclick="event.preventDefault();getElementById('hapus{{$row->id}}').submit();">
                  <button class="btn btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>

                  <form action="{{ route('user.destroy', $row->id) }}" method="post" id="hapus{{$row->id}}">
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

  @push('js')
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>

  @endpush