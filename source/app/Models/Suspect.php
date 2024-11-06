<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    protected $fillable = [
        'android_id',
        'name',
        'location',
        'keylogger',
        'squad_id'
    ];

    public function squad(){
        return $this->belongsTo(Squad::class, 'squad_id');
    }
}
