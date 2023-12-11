<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\PopulationRequest;
use App\Repository\Interfaces\HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(protected HomeInterface $repository)
    {

    }

    public function createCountry(CountryRequest $request)
    {
        try {
            return $this->created($this->repository->createCountry($request));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function createCity(CityRequest $request)
    {
        try {
            return $this->created($this->repository->createCity($request));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }

    }
    public function createPopulation(PopulationRequest $request)
    {
        try {
            return $this->created($this->repository->createPopulation($request));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }

    }
    public function report(Request $request)
    {
        try {
            return $this->success($this->repository->report($request));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function countries()
    {
        try {
            return $this->success($this->repository->countries());
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function cities(Request $request)
    {
        try {
            return $this->success($this->repository->cities($request));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
