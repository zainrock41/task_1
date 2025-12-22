@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between mb-3">
        <h4>Employees List</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
    </div>

    <table class="table table-bordered" id="EmployeeTable">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#EmployeeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employees.index') }}",
        columns: [
            { data: 'firstName', name: 'firstName' },
            { data: 'lastName', name: 'lastName' },
            { data: 'company_name', name: 'company.name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
<!-- Employee JS (validation + delete SweetAlert) -->
<script src="{{ asset('js/employee.js') }}"></script>
@endsection