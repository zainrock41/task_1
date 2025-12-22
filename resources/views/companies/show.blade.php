@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <h4>Company Details</h4>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $company->name }}</p>
            <p><strong>Email:</strong> {{ $company->email ?? '-' }}</p>
            <p><strong>Website:</strong> {{ $company->website ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
@endsection