<?php

namespace App\Models;

use Ramsey\Uuid\Uuid as Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
            } catch (\Exception) {
                abort(500);
            }
        });
    }
}
