<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name_en', 'name_fa','subCat' , 'pic' , 'content'
    ];
}
