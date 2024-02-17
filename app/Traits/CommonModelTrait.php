<?php

namespace App\Traits;


use Illuminate\Support\Str;

trait CommonModelTrait
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = $this->setSlugAttribute($model->name);
        });
    }

    public function setSlugAttribute($value): string
    {
        return Str::slug($value);
    }
}