<?php

namespace App\Models;

use Ramsey\Uuid\Uuid as Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $uuid
 * @property string $firstName
 * @property string $lastName
 * @property string $birthDay
 * @property int $age
 * @property string $email
 * @property string $address
 * @property string $numberPhone
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CustomerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Customer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBirthDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereNumberPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Customer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Customer withoutTrashed()
 * @mixin \Eloquent
 */

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstName','lastName','email','birthDay','age','address','numberPhone'
    ];

    /**
     * Generator UUID4
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->uuid = str_replace('-', '', Generator::uuid4()->toString());
            } catch (\Exception $e) {
                abort(500);
            }
        });
    }
}
