<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'transaction_date',
        'amount',
        'description',
    ];

    protected function casts()
    {
        return [
            'transaction_date' => 'date',
        ];
    }

    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    protected static function booted(): void
    {
        if (Auth::check()) {
            static::addGlobalScope('by_user', function (Builder $builder) {
                $builder->where('user_id', Auth::id());
            });
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
