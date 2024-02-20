<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use CommonModelTrait;
    protected $table = 'publishers';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
}
