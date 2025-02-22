<?php

namespace App\Models;

use App\Traits\CommonModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Modules\FileManager\app\Models\File;


/**
 * This is the model class for table "organizations".
 */
class Organization extends Model
{
    use  CommonModelTrait;

    protected $table = 'organizations';

    protected $fillable = [
        "id",
        "status",
        "created_at",
        "updated_at",
        "name",
        "latitude",
        "longitude",
        "parent_id",
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'organization_id');
    }

    public function detail(): HasOne
    {
        return $this->hasOne(OrganizationDetail::class, 'organization_id', 'id');
    }

    public function files(): BelongsToMany
    {
        return $this->belongsToMany(File::class, 'organization_files', 'organization_id', 'file_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'parent_id', 'id');
    }

    public function branches(): HasMany
    {
        return $this->hasMany(Organization::class, 'parent_id', 'id');
    }

}
