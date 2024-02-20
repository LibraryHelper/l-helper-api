<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\FileManager\app\Models\File;


/**
 * This is the model class for table "books".
 */
class Book extends Model
{
    use CommonModelTrait;

    protected $table = 'books';

    protected $fillable = [
        "id",
        "status",
        "organization_id",
        "created_at",
        "updated_at",
        "page_count",
        "published_at",
        "cover_image_id",
        "cover_type",
        "language_id",
        "publisher_id",
        "name",
        "isbn",
        "description",
        "created_by",
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function cover_image(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(BookLanguage::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }


}
