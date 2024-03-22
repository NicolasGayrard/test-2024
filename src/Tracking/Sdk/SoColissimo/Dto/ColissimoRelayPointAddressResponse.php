<?php

namespace App\Tracking\Sdk\SoColissimo\Dto;

final readonly class ColissimoRelayPointAddressResponse
{
    public function __construct(
        public string $address,
        public string $city,
        public string $zipCode,
        public string $countryCode
    )
    {
    }
}
