<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'date', 'lead', 'description', 'status', 'poster'];
}
