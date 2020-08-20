<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [
        'title', 'path', 'size', 'extension', 'priority', 'status'
    ];
}
