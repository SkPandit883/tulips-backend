<?php

namespace App\Repository\Implementations;

use App\Models\City;
use App\Models\Country;
use App\Models\Population;
use App\Repository\Interfaces\HomeInterface;
use Illuminate\Support\Facades\DB;

class HomeRepository implements HomeInterface
{

    public function createCountry($request)
    {
        return Country::create(['name' => $request->name]);

    }
    public function createCity($request)
    {
        return City::create(['country_id' => $request->country_id, 'name' => $request->name]);

    }
    public function createPopulation($request)
    {
        return Population::create([
            'city_id' => $request->city_id,
            'old_male' => $request->old_male,
            'old_female' => $request->old_female,
            'young_male' => $request->young_male,
            'young_female' => $request->young_female,
            'child_male' => $request->child_male,
            'child_female' => $request->child_female,

        ]);

    }
    public function report($request)
    {
        $countryId = $request->country;
        $cityId = $request->city;
        $gender = $request->gender;

        $populations = Population::select(
            DB::raw('SUM(old_male) as total_old_male'),
            DB::raw('SUM(old_female) as total_old_female'),
            DB::raw('SUM(young_male) as total_young_male'),
            DB::raw('SUM(young_female) as total_young_female'),
            DB::raw('SUM(child_male) as total_child_male'),
            DB::raw('SUM(child_female) as total_child_female')
        )
            ->join('cities', 'populations.city_id', '=', 'cities.id')
            ->when($countryId, function ($query) use ($countryId) {
                $query->where('cities.country_id', $countryId);
            })
            ->when($cityId, function ($query) use ($cityId) {
                $query->where('populations.city_id', $cityId);
            })
            ->first();

        return [
            'old' => $gender == 'male' ? $populations->total_old_male : ($gender == 'female' ? $populations->total_old_female : $populations->total_old_male + $populations->total_old_female),
            'young' => $gender == 'male' ? $populations->total_young_male : ($gender == 'female' ? $populations->total_young_female : $populations->total_young_male + $populations->total_young_female),
            'child' => $gender == 'male' ? $populations->total_child_male : ($gender == 'female' ? $populations->total_child_female : $populations->total_child_male + $populations->total_child_female),
            'male'=>$populations->total_old_male+$populations->total_young_male+$populations->total_child_male,
            'female'=>$populations->total_old_female+$populations->total_young_female+$populations->total_child_female
        ];
    }
    protected function countryWithHighestPopulation(){

    }
    public function countries()
    {
        return Country::all();
    }
    public function cities($request)
    {
        $cities = City::query();
        if ($request->country) {
            $cities->where('country_id', $request->country);
        }
        return $cities->get();
    }
}
