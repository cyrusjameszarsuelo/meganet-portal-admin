<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Nominee extends Model
{
    use HasFactory;

    public function nomineeBehavior(): HasMany {
        return $this->hasMany(NomineeBehavior::class);
    }

    public function nomineeValue(): HasMany {
        return $this->hasMany(NomineeValue::class);
    }
}
