<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Movie extends Model
{
    use Eloquence;

    protected $fillable = ['name', 'date', 'lead', 'description', 'status', 'poster', 'highlight_image'];

    protected $searchableColumns = ['name', 'lead', 'description'];
}
