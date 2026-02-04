<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_category_id',
        'icon',
        'title',
        'description',
        'long_description',
        'item_order',
    ];

    /**
     * Get the category that owns the item.
     */
    public function category()
    {
        return $this->belongsTo(FeatureCategory::class, 'feature_category_id');
    }
}
