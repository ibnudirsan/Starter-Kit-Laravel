<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userSecret extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'isBlock', 'secret2Fa'
    ];
}
