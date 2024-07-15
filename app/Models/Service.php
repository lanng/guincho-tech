<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'company_id',
        'insurance_id',
        'driver_id',
        'plate_id',
        'status',
        'work_order',
        'vehicle',
        'vehicle_plate',
        'origin',
        'destiny',
        'observations',
        'history',
        'name_origin',
        'doc_origin',
        'name_destiny',
        'doc_destiny',
        'toll_value',
        'total_value',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function insurance(): BelongsTo
    {
        return $this->belongsTo(Insurance::class);
    }

    public function plate(): BelongsTo
    {
        return $this->belongsTo(Plate::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
