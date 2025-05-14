<div>
    @if ($successMessage)
    <x-alert class="success" :message="$successMessage"></x-alert>
    @endif
    @error('form') <x-alert class="danger" :message="$message"></x-alert> @enderror

    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($userList as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td class="text-center">
                    <a href="#" wire:click="openEdit({{$item->id}})" class="btn btn-sm btn-info">Edit</a>
                    @if ($item->id != auth()->id())
                    <a href="#" wire:click="hapus({{$item->id}})" class="btn btn-sm btn-danger">Hapus</a>
                    @endif
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>