@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between mb-3">
        <h4>Companies List</h4>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
    </div>

    <table class="table table-bordered" id="CompanyTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
<script>
$(function () {
    $('#CompanyTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('companies.index') }}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'website', name: 'website' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
<!-- Employee JS (validation + delete SweetAlert) -->
<script src="{{ asset('js/company.js') }}"></script>
@endsection
