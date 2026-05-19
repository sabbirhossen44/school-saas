<?php

namespace App\Repositories;

use App\Models\Admin;
use Arafat\LaravelRepository\Repository;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Tenant::class;
    }

    public static function storeByRequest(Request $request, Admin $admin): Tenant
    {
        return self::create([
            'admin_id' => $admin->id,
            'name' => $request->school_name,
            'domain' => $request->domain_name,
            'database' => $request->database,
            'database_username' => $request->database_username,
            'database_password' => $request->database_password
        ]);
    }

    public static function updateByRequest(Request $request, Tenant $tenant): Tenant
    {
        $tenant->update([
            //
        ]);
        return $tenant;
    }
}
