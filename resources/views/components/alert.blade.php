@if (!empty($rowclass))
<div class="row justify-content-center">
    <div class="col-12 col-md-{{ $rowclass }}">
@endif

<div class="alert alert-{{ $class }}">{{ $message }}</div>

@if (!empty($rowclass))
    </div>
</div>
@endif