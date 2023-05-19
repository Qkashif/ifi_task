<!-- resources/views/companies/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name }}</h1>
        <p><strong>Email:</strong> {{ $company->email }}</p>
        @if ($company->logo)
            <p><img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100" height="100"></p>
        @else
            <p>No logo</p>
        @endif
        <p><strong>Website:</strong> <a href="{{ $company->website }}">{{ $company->website }}</a></p>
        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
