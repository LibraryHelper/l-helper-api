<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * This is the model class for table "publishers".
 */
class Publisher extends Model
{
    use CommonModelTrait;
    protected $table = 'publishers';

    protected $fillable = [
        "id",
        "status",
        "created_at",
        "updated_at",
        "name",
        "slug"
    ];


}
