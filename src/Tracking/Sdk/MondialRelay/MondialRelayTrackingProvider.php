<?php

namespace App\Tracking\Sdk\MondialRelay;

use App\Tracking\Handler\Domain\TrackingFailureException;
use App\Tracking\Sdk\MondialRelay\Dto\MondialRelayTrackingResponse;

class MondialRelayTrackingProvider
{
    const  string SHORTCUT = 'MR';
    public function provide (string $trackingCode): MondialRelayTrackingResponse
    {
        $parcels = [
            self::SHORTCUT.'-123456789' => 2, // sent
            self::SHORTCUT.'-D123456789' => 3 // delivered
        ];

        foreach ($parcels as $parcelCode => $parcelStatus) {
            if ($parcelCode === $trackingCode) {
                return new MondialRelayTrackingResponse(
                    $trackingCode,
                    $parcelStatus,
                    '78 rue Professeur Rochaix, 69003 LYON'
                );
            }
        }


        throw new TrackingFailureException(
            sprintf('Could not find MondialRelay parcel tracking with ID "%s".', $trackingCode)
        );
    }
}
