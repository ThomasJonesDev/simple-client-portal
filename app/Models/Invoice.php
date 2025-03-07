<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'invoice_amount',
        'invoice_status',
    ];

    public const STATUSES = ['UNPAID', 'PAID'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
