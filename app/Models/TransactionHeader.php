<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionHeader extends Model
{
    use HasFactory;

    public $table = "transaction_headers";
    protected $fillable = [
        'document_code',
        'document_number',
        'user',
        'total',
        'date'
    ];

    /**
     * Get the user that owns the TransactionHeader
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    /**
     * Get all of the comments for the TransactionHeader
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'document_number', 'document_number');
    }
}
