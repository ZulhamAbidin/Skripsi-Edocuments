<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Data;
use App\Models\Role;
use App\Models\Pengesahan;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function data()
    {
        return $this->hasMany(Data::class);
    }

     public function pengesahan()
    {
        return $this->hasMany(Pengesahan::class, 'user_id', 'id');
    }
    
    public function hasVerifiedData()
    {
        return $this->data()->where('status', 'Terverifikasi')->exists();
    }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

     public function pengalaman(): HasMany
    {
        return $this->hasMany(Pengalaman::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'NIK',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    


}
