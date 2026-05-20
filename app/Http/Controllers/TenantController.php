<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Http\Requests\TenantUpdateRequest;
use App\Models\Tenant;
use App\Repositories\AdminRepository;
use App\Repositories\TenantRepository;
class TenantController extends Controller
{
    public function index() {
        $tenants = Tenant::latest()->paginate(10)->withQueryString();
        return view('super-admin.tenants.index', compact('tenants'));
    }

    public function create() {
        return view('super-admin.tenant.create');
    }

    public function store(TenantRequest $request) {
        $admin = AdminRepository::storeByRequest($request);
        $tenant = TenantRepository::storeByRequest($request, $admin);
        return redirect()->route('tenants.index')->withSuccess('Tenant created successfully');
    }

    public function show(Tenant $tenant) {
        return view('super-admin.tenant.show', compact('tenant'));
    }

    public function edit(Tenant $tenant) {
        return view('super-admin.tenants.edit', compact('tenant'));
    }

    public function update(TenantUpdateRequest $request, Tenant $tenant) {
        $admin = AdminRepository::updateByRequest($request, $tenant->admin);
        $tenant = TenantRepository::updateByRequest($request, $tenant);
        return redirect()->route('tenants.index')->withSuccess('Tenant updated successfully');
    }
}
