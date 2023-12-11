<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'name',
    ];

    /**
     * Get the country of the city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Get the population  of the city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function population():HasOne{

        return $this->hasOne(Population::class, 'city_id');
    }



}
