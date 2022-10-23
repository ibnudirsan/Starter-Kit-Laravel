<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\HasRoles
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @property-read Role|null $roles
 * @method static \Illuminate\Database\Eloquent\Builder|HasRoles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HasRoles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HasRoles query()
 * @method static \Illuminate\Database\Eloquent\Builder|HasRoles whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HasRoles whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HasRoles whereRoleId($value)
 * @mixin \Eloquent
 * @property-read int|null $roles_count
 */

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class HasRoles extends Model
{
    use HasFactory;
    protected $table = 'model_has_roles';

    public function roles() {
        return $this->hasMany(Role::class,'id','role_id');
    }
}
