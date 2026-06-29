<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartnerLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'link_type',
        'external_url',
        'page_id',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function getLinkUrl(): ?string
    {
        return match ($this->link_type) {
            'external' => $this->external_url,
            'page' => $this->page ? route('pages.show', $this->page->slug) : null,
            default => null,
        };
    }
}
