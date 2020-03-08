@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Error!</h5>
    {{ session('error') }}
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Warning!</h5>
    {{ session('warning') }}
</div>
@endif

@if (session('info'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i> Info!</h5>
    {{ session('info') }}
</div>
@endif

@if (session('confirmation'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-question-circle"></i> Confirmation</h5>
    {{ session('confirmation') }}
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        <input name="colour_id" type="hidden" value="{{ session('product')['colour_id'] }}">
        <input name="size_id" type="hidden" value="{{ session('product')['size_id'] }}">
        <input name="type_id" type="hidden" value="{{ session('product')['type_id'] }}">
        <input name="warehouse_id" type="hidden" value="{{ session('product')['warehouse_id'] }}">
        <input name="stock" type="hidden" value="{{ session('product')['stock'] }}">
        <input name="allow" type="hidden" value="1">

        <button type="submit" class="btn btn-danger btn-sm">Ya</button>
        <button class="btn btn-secondary btn-sm" data-dismiss="alert" aria-hidden="true">Tidak</button>
    </form>

</div>
@endif