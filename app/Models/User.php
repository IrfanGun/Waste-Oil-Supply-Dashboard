<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasPermissions;
     protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const DEFAULT_PROFILE_IMAGE = 'profile/default.jpg';

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'kota',
        'no_hp',
        'gender',
        'posisi',
        'status',
        'avatar',
        'created_at'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        static::creating(function (User $user) {
            $user->avatar = self::DEFAULT_PROFILE_IMAGE;
        });
    }

    public function saldo() {
        return $this->hasOne(saldo::class);
    }

    public function suplai() {
        return $this->hasMany(suplai::class, 'user_id', 'id')->orderByDesc('id');
    }

    public function riwayatPenarikan() {
        return $this->hasMany(riwayatPenarikan::class, 'user_id', 'id')->orderByDesc('id');
    }

    public function pengiriman() {
        return $this->hasMany(pengiriman::class, 'user_id', 'id')->orderByDesc('id');
    }

    public function helpdesk() {
        return $this->hasMany(helpdesk::class, 'user_id', 'id'); 
    }

    public function scopeSearch($query, $value) {
        $query->where('name', 'like', "%{$value}%");
        
        } 
    public function scopePelanggan($query)
    {
            return $query->where('posisi', 'pelanggan');
    }

    }