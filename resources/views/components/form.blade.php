<form action="{{ $action ?? '' }}" method="{{ $method ?? 'POST' }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    {{ $slot }}
</form>