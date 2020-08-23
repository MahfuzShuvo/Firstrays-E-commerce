<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmallBanner extends Model
{
    public $fillable = [
        'title_1', 'title_2', 'title_3',
        'path_1', 'path_2', 'path_3',
        'size_1', 'size_2', 'size_3',
        'extension_1', 'extension_2', 'extension_3',
        'url_1', 'url_2', 'url_3',
        'status'
    ];
}
