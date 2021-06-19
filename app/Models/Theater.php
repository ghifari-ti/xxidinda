<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }

}
