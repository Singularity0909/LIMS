<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lent extends Model
{
    protected $table = 'lent';

    protected $fillable = [
        'uid', 'bid', 'lent_at', 'due_at'
    ];

    public $timestamps = false;
}
