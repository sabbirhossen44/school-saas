<?php

namespace App\Repositories;

use Arafat\LaravelRepository\Repository;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return User::class;
    }

    public static function storeByRequest(Request $request): User
    {
        return self::create([
            //
        ]);
    }

    public static function updateByRequest(Request $request, User $user): User
    {
        $user->update([
            //
        ]);
        return $user;
    }
}
