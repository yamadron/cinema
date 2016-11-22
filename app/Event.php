<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['headline', 'publish_date', 'lead', 'body', 'image'];
}
