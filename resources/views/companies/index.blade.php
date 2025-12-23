@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between mb-3">
        <h4>Companies List</h4>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
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
<script src="{{ asset('js/company.js') }}"></script>
@endsection
