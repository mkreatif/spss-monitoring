@extends('layouts.app')

@section('content')
<!-- Tombol Tambah User -->
<div class="p-4">
    <a href="{{ route('template.create') }}" class="btn btn-primary mb-3">+ Create New Template</a>
</div>
<table id="template-table" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Template Name</th>
            <th>Expedition Name</th>
            <th>Awb Position Column</th>
            <th>Need Matching</th>
            <th>Action</th>
            
        </tr>
    </thead>
</table>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#template-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("template.data") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                 {
                    data: 'cabang',
                    name: 'cabang'
                },
                {
                    data: 'expedition_name',
                    name: 'expedition_name'
                },
                {
                    data: 'awb_number',
                    name: 'awb_number'
                },
               
                {
                    data: 'is_need_matching',
                    name: 'is_need_matching'
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