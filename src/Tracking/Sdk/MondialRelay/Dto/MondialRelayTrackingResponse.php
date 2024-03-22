<?php

namespace App\Tracking\Sdk\MondialRelay\Dto;

final readonly class MondialRelayTrackingResponse
{
    public function __construct(
        public string $trackingId,
        public int $status,
        public string $address,
        public \DateTimeInterface $updatedAt = new \DateTimeImmutable()
    )
    {
    }
}
