<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\kelas;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',

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
    ];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['santri'] ?? false, function ($query, $santri) {
            if ($santri == 'kang') {
                return $query->where('nis', '<', 2000000);
            }
            if ($santri == 'mbak') {
                return $query->where('nis', '>=', 2000000);
            }
        });
    }




    public function Kelas()
    {
        return $this->hasOne(kelas::class, 'id', 'kelas');
    }
    public function wifi()
    {
        return $this->hasOne(wifi::class, 'nis', 'nis');
    }
}
