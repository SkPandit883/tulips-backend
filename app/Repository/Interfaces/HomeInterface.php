<?php
namespace App\Repository\Interfaces;

interface HomeInterface
{
    public function createCountry($request);
    public function createCity($request);
    public function createPopulation($request);
    public function report($request);
    public function countries();
    public function cities($request);
}
