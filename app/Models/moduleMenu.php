<?php

namespace App\Models;

use Ramsey\Uuid\Uuid as Generator;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class moduleMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','module_name'
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->id = Generator::uuid4()->toString();
            } catch (\Exception) {
                abort(500);
            }
        });
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class,'module_id','id');
    }

}
