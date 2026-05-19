@extends('layouts.app')

{{-- @section('title', $app_setting['name'] . ' | Branch List') --}}

@section('content')
    <!-- ****Body-Section***** -->
    <div class="app-main-outer">
        <div class="app-main-inner">
            <div
                class="page-title-actions px-3 py-3 d-flex justify-content-between align-items-center bg-white rounded mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $tenant->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('tenants.index') }}" class="btn btn-shadow btn-outline-primary mr-3 ms-auto">
                        {{ 'All Tenant' }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="m-0 p-0">{{ __('Edit Tenant') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('tenant.update', $tenant->id) }}" method="POST" id="registrationForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4">Admin Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter full name" value="{{ old('name') ?? $tenant->admin->name }}" required>
                                            @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter email address" value="{{ old('email') ?? $tenant->admin->email }}" required>
                                            @error('email')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Telephone Number</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone"
                                                placeholder="Enter telephone number" value="{{ old('telephone') ?? $tenant->admin->telephone }}">
                                            @error('telephone')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="Enter phone number" value="{{ old('phone') ?? $tenant->admin->phone }}" required>
                                            @error('phone')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4">Tenant Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="schoolName" class="form-label">School Name</label>
                                            <input type="text" class="form-control" id="schoolName"
                                                name="school_name" placeholder="abc school"
                                                value="{{ old('school_name') ?? $tenant->name }}" required>
                                            @error('school_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="domainName" class="form-label">Domain Name</label>
                                            <input type="text" class="form-control" id="domainName"
                                                name="domain_name" placeholder="example.com"
                                                value="{{ old('domain_name') ?? $tenant->domain }}" required>
                                            @error('domain_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="database" class="form-label">Database Name</label>
                                            <input type="text" class="form-control" id="database" name="database"
                                                placeholder="abc_db" value="{{ old('database') ?? $tenant->database }}" required>
                                            @error('database')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="databaseUsername" class="form-label">Database User Name</label>
                                            <input type="text" class="form-control" id="databaseUsername"
                                                name="database_username" placeholder="abc_user"
                                                value="{{ old('database_username') ?? $tenant->database_username }}" required>
                                            @error('database_username')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update Tenant</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ****End-Body-Section**** -->
@endsection
