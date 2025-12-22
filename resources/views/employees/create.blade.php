@extends('layouts.app')

@section('content')
    @include('partials.alerts')

    <h4>Create Employee</h4>

    <form id="EmployeeCreateForm" action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control" value="{{ old('firstName') }}">
        </div>
        <div class="mb-3">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" class="form-control" value="{{ old('lastName') }}">
        </div>
        <div class="mb-3">
            <label for="companyId">Company</label>
            <select name="companyId" id="companyId" class="form-control">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('companyId') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
