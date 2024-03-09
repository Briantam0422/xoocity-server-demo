<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
        'avatar'
    ];

    public function scopeFindById($query, $user_id){
        return $query->where('id', $user_id);
    }

    public function getUser($user_id, array $with = []){
        return $this->findById($user_id)->with($with)->first();
    }

    public function getAvatarAttribute(){
        return env('APP_URL') . 'api/storage?path=' . $this->avatar_path;
    }
}
