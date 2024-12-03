<?php

namespace App\Interface;

interface NasaApiInterface{
    public function fetchData(string $endpoint): array;
}
