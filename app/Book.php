<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fileable = [
        'title',
        'category',
        'file_name',
        'body',
    ];
}
