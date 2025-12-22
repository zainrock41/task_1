@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <h4>Edit Company</h4>

    <form id="CompanyEditForm" action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name) }}">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email) }}">
        </div>
        <div class="mb-3">
            <label for="website">Website</label>
            <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $company->website) }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection