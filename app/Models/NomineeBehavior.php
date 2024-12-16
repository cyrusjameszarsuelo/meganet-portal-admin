<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NomineeBehavior extends Model
{
    use HasFactory;

    public function behavior(): BelongsTo {
        return $this->belongsTo(Behavior::class);
    }
}
