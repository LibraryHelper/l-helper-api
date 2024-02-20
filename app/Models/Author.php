<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use CommonModelTrait;

    protected $fillable = [
        'name',
        'status'
    ];

}
