<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'short_description',
        'long_description',
        'image',
        'tab_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the service items for this service.
     */
    public function items()
    {
        return $this->hasMany(ServiceItem::class)->orderBy('column_number')->orderBy('item_order');
    }

    /**
     * Scope a query to only include active services.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order services by tab order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('tab_order');
    }
}
