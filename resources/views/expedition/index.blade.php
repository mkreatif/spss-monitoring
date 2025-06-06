@extends('layouts.app')

@section('content')
<!-- Tombol Tambah User -->
<div class="p-4">
    <a href="{{ route('expedition.create') }}" class="btn btn-primary mb-3">+ Create New Expedition</a>
</div>
<table id="expedition-table" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Expedition Name</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#expedition-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("expedition.data") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'expedition_name',
                    name: 'expedition_name'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });
    });
</script>
@endpush