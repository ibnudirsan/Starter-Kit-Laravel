<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as Generator;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email','firstName','lastName','address','numberPhone'
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
