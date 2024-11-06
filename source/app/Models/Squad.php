<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    protected $fillable = [
        'name',
        'captain_id',
    ];

    public function captain(){
        return $this->belongsTo(User::class, 'captain_id');
    }
}
