<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Megaproject extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function megaprojectSegments(): HasMany {
        return $this->hasMany(MegaprojectSegment::class);
    }

}
