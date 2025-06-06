@extends('layouts.app')

@section('content')
<!-- Tombol Tambah User -->
<div class="p-4">
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>
</div>
<table id="users-table" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Role</th>
        </tr>
    </thead>
</table>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("user.data") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'role',
                    name: 'role'
                },
            ]
        });
    });
</script>
@endpush