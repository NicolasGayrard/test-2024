<?php

namespace App\Tracking\Handler;

use App\Tracking\Handler\Domain\TrackingFailureException;

interface TrackingHandlerInterface
{
    /**
     * Returns whether the handler can handle the given tracking code.
     *
     * @param string $trackingCode the postal service tracking code.
     * @return bool whether the handler can handle the tracking code.
     */
    public function supports(string $trackingCode): bool;

    /**
     * Consumes given tracking code and handles it.
     *
     * @param string $trackingCode the parcel tracking code to be handled.
     *
     * @throws TrackingFailureException when tracking has not completed successfully.
     */
    public function handle(string $trackingCode): void;
}
