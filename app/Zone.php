<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function district()
    {
    	return $this->belongsTo(District::class)->withDefault();
    }
}
