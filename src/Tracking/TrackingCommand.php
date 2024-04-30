<?php

namespace App\Tracking;

use App\Notification\Domain\Notification;
use App\Tracking\Sdk\MondialRelay\MondialRelayTrackingProvider;
use App\Tracking\Sdk\SoColissimo\ColissimoTrackingProvider;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Style\SymfonyStyle;

use function Symfony\Component\String\s;

#[AsCommand(name: 'parcel:tracking')]
final class TrackingCommand extends Command
{
    public function __construct(
        private readonly TrackingManager $trackingManager,
        private readonly MondialRelayTrackingProvider $mondialRelayTrackingProvider,
        private readonly ColissimoTrackingProvider $colissimoTrackingProvider
    ) {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        $this->addArgument('trackingCode', InputArgument::REQUIRED, 'The tracking code');
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $trackingCode = $input->getArgument('trackingCode');

        if (null === $trackingCode) {
            throw new \InvalidArgumentException('Cannot proceed without valid "trackingCode".');
        }

        $customer = explode("-", $trackingCode);


        switch ($customer[0]) {
            case MondialRelayTrackingProvider::SHORTCUT:
                $response = $this->mondialRelayTrackingProvider->provide($trackingCode);
                break;
            case ColissimoTrackingProvider::SHORTCUT:
                $response = $this->colissimoTrackingProvider->provide($trackingCode);
                break;
        }

//        $this->trackingManager->track($trackingCode);

        //send to customer
        $message = "New " . $response->getName() . " parcel \"" .$trackingCode . " \" "  . $response->getStatus();
        $io->info($message);
        $notification = new Notification("New " . $response->getName() . " parcel \"" .$trackingCode . " \" "  . $response->getStatus());

        return Command::SUCCESS;
    }
}
