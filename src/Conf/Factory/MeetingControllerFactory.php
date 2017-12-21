<?php

declare(strict_types=1);

namespace Conf\Factory;

use Conf\Controller\MeetingController;
use Conf\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

final class MeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : MeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new MeetingController($meetingRepository);
    }
}