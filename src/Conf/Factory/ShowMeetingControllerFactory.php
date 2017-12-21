<?php

declare(strict_types=1);

namespace Conf\Factory;

use Conf\Controller\ShowMeetingController;
use Conf\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

class ShowMeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new ShowMeetingController($meetingRepository);
    }
}