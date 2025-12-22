@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <h4>Create Company</h4>

    <form id="CompanyCreateForm" action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="website">Website</label>
            <input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection

