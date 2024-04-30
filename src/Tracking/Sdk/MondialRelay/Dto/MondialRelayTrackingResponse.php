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

    public function getStatus(): int
    {
        return $this->status;
    }


    public function getTrackingId(): string
    {
        return $this->trackingId;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getName(): string
    {
        return "Mondial Relay";
    }
}
