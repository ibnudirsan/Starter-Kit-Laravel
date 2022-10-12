<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profileUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'fullName', 'imageName', 'pathImage', 'numberPhone', 'TeleID'
    ];
}
