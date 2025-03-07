<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SupportTicket extends Model
{
    use HasFactory;
    protected $table = 'support_ticket';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'user_id',
    ];
    const STATUSES = ['OPEN', 'CLOSED'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
