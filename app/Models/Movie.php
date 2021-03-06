<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;


    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}
