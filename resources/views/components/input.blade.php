@if (!empty($rowclass))
<div class="row mb-3 justify-content-center">
    <div class="col-12 col-md-{{ $rowclass }}">
@endif

<div class="form-group">
    <label>{{ $label  }}</label>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control {{ $class }}" wire:model="{{ $wiremodel }}"
        @foreach ($attr as $key => $item)
        {!! $key !!}="{{ $item }}"
        @endforeach
    />
</div>

@if (!empty($rowclass))
    </div>
</div>
@endif