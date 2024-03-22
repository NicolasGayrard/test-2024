<?php

namespace App\Tracking\Sdk\SoColissimo\Dto;

enum ColissimoTrackingStatus: string
{
    case Sent = 'sent';
    case Delivered = 'delivered';
    case Lost = 'lost';

    public function isDelivered(): bool
    {
        return self::Delivered->value === $this->value;
    }
}
