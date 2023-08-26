<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;

    protected $table = 'phone';

    public function typephone()
    {
        return $this->belongsTo('App\Models\typephone');
    }
}
