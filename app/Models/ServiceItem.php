<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'column_number',
        'item_order',
    ];

    /**
     * Get the service that owns the item.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
