<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Returned extends Model
{
    protected $table = 'returned';

    protected $fillable = [
        'uid', 'bid', 'lent_at', 'returned_at'
    ];

    public $timestamps = false;
}
