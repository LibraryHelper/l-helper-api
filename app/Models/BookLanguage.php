<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\FileManager\app\Models\File;

class BookLanguage extends Model
{
    use CommonModelTrait;

    protected $table = 'book_languages';

    protected $fillable = [
        'name',
        'icon_id',
    ];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(File::class, 'icon_id');
    }

}
