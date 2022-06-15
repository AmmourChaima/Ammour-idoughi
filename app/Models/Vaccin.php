<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccin extends Model
{
    use HasFactory;

    public function polycliniques()
    {
        return $this->belongsToMany(Polyclinique::class);
    }
}
