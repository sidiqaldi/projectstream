<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuid
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }
}