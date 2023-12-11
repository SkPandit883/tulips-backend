<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Population extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'old_male',
        'old_female',
        'young_male',
        'young_female',
        'child_male',
        'child_female'
    ];

    
    /**
     * Get the city  of the population.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

  
}
