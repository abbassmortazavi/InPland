<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable =
        [
            'name_fa' , 'name_en'
        ];
}
