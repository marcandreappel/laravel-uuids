<?php
declare(strict_types=1);

namespace MarcAndreAppel\LaravelUuids;

use Illuminate\Support\Str;

trait WithUuids
{
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            $model->keyType = 'string';
            $model->incrementing = false;
            $model->casts = array_merge($model->casts, ['id' => 'string']);

            $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: Str::orderedUuid()->toString();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getRouteKey(): string
    {
        return 'uuid';
    }
}
