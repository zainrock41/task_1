@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <h4>Employee Details</h4>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $employee->firstName }}</p>
            <p><strong>Last Name:</strong> {{ $employee->lastName }}</p>
            <p><strong>Company:</strong> {{ $employee->company?->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email ?? '-' }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
@endsection