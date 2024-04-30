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

    public function getStatus(): ColissimoTrackingStatus
    {
        return $this->status;
    }

    public function getTrackingCode(): string
    {
        return $this->trackingCode;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getAddress(): ColissimoRelayPointAddressResponse
    {
        return $this->address;
    }

    public function getName(): string
    {
        return "SoColissimo";
    }
}
