<?php
namespace App\Repository\Interfaces;

interface AuthInterface
{

    public function login($request);
    public function logout($request);
}
