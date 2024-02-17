<?php

namespace App\Traits;


use Illuminate\Support\Str;

trait CommonModelTrait
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

}
