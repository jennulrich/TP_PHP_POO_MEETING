<?php

declare(strict_types=1);

namespace Conf\Factory;

use Conf\Repository\MeetingRepository;
use PDO;
use Psr\Container\ContainerInterface;

class MeetingRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : MeetingRepository
    {
        $pdo = $container->get(PDO::class);

        return new MeetingRepository($pdo);
    }
}