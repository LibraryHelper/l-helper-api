<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\FileManager\app\Models\File;


/**
 * This is the model class for table "book_languages".
 */
class BookLanguage extends Model
{
    use CommonModelTrait;

    protected $table = 'book_languages';

    protected $fillable = [
        "icon_id",
        "created_at",
        "updated_at",
        "id",
        "status",
        "name",
        "slug"
    ];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

}
