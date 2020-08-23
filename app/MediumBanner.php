<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediumBanner extends Model
{
    public $fillable = [
        'header_txt_1', 'header_txt_2',
        'txt_1', 'txt_2',
        'discount_1', 'discount_2',
        'title_1', 'title_2',
        'path_1', 'path_2',
        'size_1', 'size_2',
        'extension_1', 'extension_2',
        'url_1', 'url_2',
        'status'
    ];
}
