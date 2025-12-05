<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kampong extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'mukim_id',
        'name',
        'name_bn',
        'postcode',
    ];

    /**
     * @return BelongsTo<Mukim, Kampong>
     */
    public function mukim(): BelongsTo
    {
        return $this->belongsTo(Mukim::class);
    }
}
