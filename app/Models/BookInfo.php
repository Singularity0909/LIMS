<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookInfo extends Model
{
    protected $table = 'books_info';
    protected $fillable = [
        'isbn', 'title', 'category', 'author', 'publisher', 'cover', 'intro', 'price', 'total', 'available', 'location',
    ];
    protected $primaryKey = 'isbn';
    public $incrementing = false;
    public $timestamps = false;
}
