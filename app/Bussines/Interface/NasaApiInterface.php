<?php

namespace App\Bussines\Interface;

interface NasaApiInterface{
    public function fetchData(string $endpoint): array;
}
