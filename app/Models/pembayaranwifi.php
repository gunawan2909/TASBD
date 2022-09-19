<?php

namespace App\Models;

use App\Models\paketwifi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembayaranwifi extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function paketwifi()
    {
        return $this->belongsTo(paketwifi::class, 'paket', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nis', 'nis');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            return $query->whereMonth('created_at', $bulan);
        });
        $query->when($filters['santri'] ?? false, function ($query, $santri) {
            if ($santri == 'kang') {
                return $query->where('nis', '<', 2000000);
            }
            if ($santri == 'mbak') {
                return $query->where('nis', '>=', 2000000);
            }
        });
        $query->when($filters['admin'] ?? false, function ($query, $admin) {
            return $query->where('admin', $admin);
        });
    }
}
