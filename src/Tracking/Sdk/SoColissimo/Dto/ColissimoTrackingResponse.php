<?php

namespace App\Tracking\Sdk\SoColissimo\Dto;

final readonly class ColissimoTrackingResponse
{
    public function __construct(
        public string $trackingCode,
        public ColissimoTrackingStatus $status,
        public ColissimoRelayPointAddressResponse $address,
        public \DateTimeInterface $updatedAt = new \DateTimeImmutable()
    )
    {
    }
}
