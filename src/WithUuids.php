<?php
declare(strict_types=1);

namespace MarcAndreAppel\LaravelUuids;

use Illuminate\Support\Str;

trait WithUuids
{
    protected static function bootWithUuids(): void
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
            $model->keyType = 'string';
            $model->incrementing = false;
            $model->casts = array_merge($model->casts, ['id' => 'string']);

            $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: Str::orderedUuid()->toString();
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public function getRouteKey(): string
    {
        return 'uuid';
    }
}
