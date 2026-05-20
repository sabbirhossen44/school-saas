<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class SuperAdmin extends Model
{
    protected $guarded = ['id'];

     use HasRoles, SoftDeletes;
}
