@extends('layouts.app')

@section('title' , 'Role')

@section('css')
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}    ">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form</h3>
            </div>
            <form role="form" action="{{ route('role.store') }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <input type="text" name="name" id="Role" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Permission">Permission</label>
                        <select name="permission[]" id="Permission" value="{{ old('permission[]') }}" class="duallistbox" multiple="multiple">
                            @foreach($permissionOptions as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

<script>
    $(function() {
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    })
</script>

@endpush