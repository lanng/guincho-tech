<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_id',
        'company_id',
        'invoice_number',
        'value',
        'issue_date',
        'due_date',
        'status',
    ];

    public function services(): HasMany
    {
        return $this->HasMany(Service::class);
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function insurance(): HasOne
    {
        return $this->hasOne(Insurance::class);
    }
}
