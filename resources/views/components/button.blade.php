@if (!empty($rowclass))
<div class="row mt-4 justify-content-center">
    <div class="col-12 col-md-{{ $rowclass }}">
@endif

<div class="form-group">
    <button type="{{ $type ?? 'button' }}" class="btn btn-{{ $class ?? 'success' }}">{{ $label }}</button>
    {{ $slot }}
</div>

@if (!empty($rowclass))
    </div>
</div>
@endif