<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaccin;

class Polyclinique extends Authenticatable
{
    use HasFactory;

    public function vaccins()
    {
        return $this->belongsToMany(Vaccin::class);
    }
}
