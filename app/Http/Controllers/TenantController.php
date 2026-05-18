<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index() {
        return view('super-admin.tenants.index');
    }

    public function create() {
        return view('super-admin.tenants.create');
    }

    public function store(TenantRequest $request) {
        Tenant::create([
            'domain' => $request->domain_name,
            'database' => $request->database,
            'database_username' => $request->database_username,
            'database_password' => $request->database_password
        ]);

        return redirect()->route('tenants.index')->withSuccess('Tenant created successfully');
    }
}
