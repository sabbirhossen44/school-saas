<?php

namespace App\Repositories;

use Arafat\LaravelRepository\Repository;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Admin::class;
    }

    public static function storeByRequest(Request $request): Admin
    {
        return self::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);
    }

    public static function updateByRequest(Request $request, Admin $admin): Admin
    {
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'telephone' => $request->telephone,
        ]);
        return $admin;
    }
}
