@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between mb-3">
        <h4>Employees List</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
    </div>

    {{-- Render table automatically --}}
    {!! $dataTable->table(['class' => 'table table-bordered table-striped']) !!}
@endsection

@section('scripts')
    {!! $dataTable->scripts() !!}
@endsection

@section('scripts')
</script>
<!-- Employee JS (validation) -->
<script src="{{ asset('js/employee.js') }}"></script>
@endsection
