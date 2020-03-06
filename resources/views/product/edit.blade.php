@extends('layouts.app')

@section('title' , 'Product')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form</h3>
            </div>
            <form role="form" action="{{ route('product.update', $product->id) }}" method="post">
                @csrf
                @method('put')

                <div class="card-body">
                    <div class="form-group">
                        <label for="Nama">Type</label>
                        <select name="type_id" class="form-control select2bs4" style="width: 100%;">
                        @foreach($type as $row) 
                            <option value="{{ $row->id }}" {{ $row->id == $product->type->id ? 'selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Warna</label>
                        <select name="colour_id" class="form-control select2bs4" style="width: 100%;">
                            @foreach($colour as $row)
                            <option value="{{ $row->id }}"  {{ $row->id == $product->colour->id ? 'selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Size</label>
                        <select name="size_id" class="form-control select2bs4" style="width: 100%;">
                            @foreach($size as $row)
                            <option value="{{ $row->id }}"  {{ $row->id == $product->size->id ? 'selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Penyimpanan</label>
                        <select name="storage_id" class="form-control select2bs4" style="width: 100%;">
                            @foreach($storage as $row)
                            <option value="{{ $row->id }}"  {{ $row->id == $product->storage->id ? 'selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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