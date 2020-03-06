@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('error') }}</strong>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('warning') }}</strong>
</div>
@endif

@if (session('info'))
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('info') }}</strong>
</div>
@endif