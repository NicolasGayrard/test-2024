<?php

namespace App\Customer;

use App\Customer\Domain\Customer;

class CustomerResolver
{
    public function resolveByParcelTrackingId(string $trackingCode): Customer
    {
        if (str_starts_with($trackingCode, 'MR-')) {
            return new Customer('John Doe', 'j.doe@mondialrelay.com');
        }

        return new Customer('John Wayne', 'j.wayne@soco.com');
    }
}
