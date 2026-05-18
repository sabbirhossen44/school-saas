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
                        <li class="breadcrumb-item"><a href="#">Tenant List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                            <h3 class="m-0 p-0">{{ __('Create New Tenant') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('tenants.store') }}" method="POST" enctype="multipart/form-data"
                id="registrationForm">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <strong>Whoops!</strong> Please fix the following errors:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4">Tenant Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="domainName" class="form-label">Domain Name</label>
                                            <input type="text" class="form-control" id="domainName" name="domain_name" placeholder="example.com" value="{{ old('domain_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="database" class="form-label">Database Name</label>
                                            <input type="text" class="form-control" id="database" name="database" placeholder="abc_db"
                                                value="{{ old('database') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="databaseUsername" class="form-label">Database User Name</label>
                                            <input type="text" class="form-control" id="databaseUsername" name="database_username" placeholder="abc_user"
                                                value="{{ old('database_username') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="databasePassword" class="form-label">Database Password</label>
                                            <input type="password" class="form-control" id="databasePassword" name="database_password" placeholder="abc_password"
                                                value="{{ old('database_password') }}" required>
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
                                <button type="submit" class="btn btn-primary">Create Tenant</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ****End-Body-Section**** -->
@endsection
