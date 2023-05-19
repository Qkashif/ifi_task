<!-- resources/views/companies/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex">
            <div>
                <a class="btn btn-primary" href="{{ route('companies.index') }}">Company</a>
            </div>
            <div style="margin-left: 13px;">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">
                    Employee
                </a>
            </div>
        </div>
    </div>
</div>

<br>

    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="50" height="50">
                            @else
                                No logo
                            @endif
                        </td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection
