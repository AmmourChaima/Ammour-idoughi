<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rdv extends Model
{
    use HasFactory;

    public function polyclinique()
    {
        $this->HasOne(Polyclinique::class, 'polyclinique_id', 'id');
    }

    public function user()
    {
        $this->HasOne(User::class, 'user_id', 'id');
    }

    public function vaccin()
    {
        $this->HasOne(Vaccin::class, 'vaccin_id', 'id');
    }
}
