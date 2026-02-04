<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'tab_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the feature items for this category.
     */
    public function items()
    {
        return $this->hasMany(FeatureItem::class)->orderBy('item_order');
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order categories by tab order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('tab_order');
    }
}
