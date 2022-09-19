<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelas extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'kelas', 'id');
    }
}
