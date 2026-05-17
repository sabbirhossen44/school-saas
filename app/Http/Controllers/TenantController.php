<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index() {
        return view('super-admin.tenants.index');
    }

    public function create() {
        return view('super-admin.tenants.create');
    }
}
