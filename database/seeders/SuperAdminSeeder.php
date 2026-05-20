<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = [
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'phone' => '01408411241',
            'telephone' => '01408411241',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ];

        $superAdmin = SuperAdmin::query()->updateOrCreate(
            [
                'email' => $superAdmin['email']
            ],[
                'name' => $superAdmin['name'],
                'phone' => $superAdmin['phone'],
                'telephone' => $superAdmin['telephone'],
                'password' => $superAdmin['password'],
                'email_verified_at' => $superAdmin['email_verified_at'],
            ]

        );

        // $superAdmin->assignRole('super-admin');
    }
}
