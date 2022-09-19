<?php

namespace App\Models;

use App\Models\paketwifi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class wifi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function paketwifi()
    {
        return $this->hasMany(paketwifi::class, 'id', 'paket');
    }
}
