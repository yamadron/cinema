<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Event extends Model
{
    use Eloquence;

    protected $fillable = ['headline', 'publish_date', 'lead', 'body', 'image'];

    protected $searchableColumns = ['headline', 'lead', 'body'];
}
