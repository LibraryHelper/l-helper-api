<?php

namespace App\Traits;


use Illuminate\Support\Str;

trait CommonModelTrait
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name).'-'.rand(100000, 999999);
        });
        static::updating(function ($model) {
            if ($model->isDirty('name') && !empty($model->slug)) {
                $explode = explode('-', $model->slug);
                $oldSlugNumber = end($explode);
                $model->slug = Str::slug($model->name).'-'.$oldSlugNumber;
            } elseif (empty($model->slug)) {
                $model->slug = Str::slug($model->name).'-'.rand(100000, 999999);
            }
        });
    }

}
