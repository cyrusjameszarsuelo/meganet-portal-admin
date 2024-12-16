<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MegatriviaAnswer extends Model
{
    use HasFactory;

    public function megatrivia(): BelongsTo {
        return $this->belongsTo(Megatrivia::class);
    }
}
