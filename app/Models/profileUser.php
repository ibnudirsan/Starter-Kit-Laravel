<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\profileUser
 *
 * @property int $id
 * @property int $user_id
 * @property string $fullName
 * @property string $imageName
 * @property string $pathImage
 * @property string $numberPhone
 * @property string $TeleID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereNumberPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser wherePathImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereTeleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|profileUser whereUserId($value)
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
class profileUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'fullName', 'imageName', 'pathImage', 'numberPhone', 'TeleID'
    ];
}
