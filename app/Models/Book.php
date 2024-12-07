<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable =
        [
        'title',
        'author',
        'description',
        'published_year',
        'status',
    ];




    public static function findAllBooks() {
        return Book::orderBy('title', 'ASC')->paginate(20);
    }


}
