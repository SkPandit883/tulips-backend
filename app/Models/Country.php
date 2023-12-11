<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * Get the cities of the  country .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'country_id');
    }

    public function population(){
        return $this->through('cities')->has('population');
    }
}
