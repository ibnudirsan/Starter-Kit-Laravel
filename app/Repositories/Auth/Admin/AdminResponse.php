<?php

namespace App\Repositories\Auth\Admin;

use App\Models\User;
use App\Models\userSecret;
use Spatie\Permission\Models\Role;
use App\Repositories\Auth\Admin\AdminDesign;
use LaravelEasyRepository\Implementations\Eloquent;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class AdminResponse extends Eloquent implements AdminDesign {
    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    public function __construct(User $model, Role $role, userSecret $secret)
    {
        $this->model    = $model;
        $this->role     = $role;
        $this->secret   = $secret;
    }

    public function datatable()
    {
        return $this->model->select('id','uuid','name','deleted_at','email','created_at')
                            ->whereLevel(2)
                            ->with('profile','secret');
    }

    public function role()
    {
        return $this->role->select('id','name','guard_name')
                            ->whereNotIn('name',['SuperAdmin'])
                            ->whereNull('deleted_at')
                            ->orderby('id','desc')
                            ->get();
    }

    public function create($param)
    {
        $google2fa      = app('pragmarx.google2fa');
        $NewSecretKey   = $google2fa->generateSecretKey();

        $user = $this->model->create([
            'name'     => $param->name,
            'email'    => $param->email,
            'level'    => 2,
            'password' => bcrypt($param->password)
        ]);
            $user->profile()->create([
                'user_id'       => $user->id,
                'fullName'      => $param->fullName,
                'imageName'     => $param->name,
                'pathImage'     => empty($param->pathImage)   ? 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' : $param->pathImage,
                'numberPhone'   => empty($param->Numberphone) ? '0' : $param->Numberphone,
                'TeleID'        => empty($param->telegramid)  ? '0' : $param->telegramid,
            ]);
                $user->secret()->create([
                    'user_id'   => $user->id,
                    'secret2Fa' => $NewSecretKey
                ]);
                    $user->assignRole($param->roles);
    }

    public function edit($id)
    {
        return $this->model->select('id','uuid','name','email')
                            ->with('profile','secret')
                            ->whereUuid($id)
                            ->firstOrFail();
    }

    public function update($param, $id)
    {
        $google2fa      = app('pragmarx.google2fa');
        $NewSecretKey   = $google2fa->generateSecretKey();
        $user           = $this->model->whereUuid($id)->first();

        if($param->filled('password')) {
            $user->update([
                'name'      => $param->name,
                'email'     => $param->email,
                'password'  => bcrypt($param->password)
            ]);
                $user->profile()->update([
                    'fullName'      => $param->fullName,
                    'numberPhone'   => $param->Numberphone,
                    'TeleID'        => $param->telegramid,
                ]);
                    $user->syncRoles($param->roles);
        } elseif (!$param->filled('password')) {
            $user->update([
                'name'      => $param->name,
                'email'     => $param->email,
            ]);
                $user->profile()->update([
                    'fullName'      => $param->fullName,
                    'numberPhone'   => $param->Numberphone,
                    'TeleID'        => $param->telegramid,
                ]);
                    $user->syncRoles($param->roles);
        }
            if($param->filled('google2fa')) {
                $user->secret()->update([
                    'secret2Fa' => encrypt($NewSecretKey),
                    'statusOTP' => 0,
                    'timeOTP'   => null
                ]);
            }
    }

    /**
     * Query for Trashed Data.
     */
    public function trashedData($id)
    {
        $result = $this->model->find($id);
        $result->secret()->update([
            'isBlock'   => true
        ]);
            return $result->delete();
    }

    /**
     * Get One User
     */
    public function trashedfirst($id)
    {
        return $this->model->select('name','email')
                           ->whereId($id)
                           ->withTrashed()
                           ->firstOrFail();
    }

    /**
     * Query for Restore Data.
     */
    public function restore($id)
    {
        $result = $this->model
                        ->withTrashed()
                        ->find($id);

            $result->secret()->update([
                'isBlock'   => false
            ]);
                return $result->restore();
    }
}
