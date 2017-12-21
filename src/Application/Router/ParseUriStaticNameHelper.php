<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\IndexController;
use Conf\Controller\MeetingController;
use Conf\Controller\ShowMeetingController;
use Exception;

use function explode;
use function preg_match;
use function substr;
use function urldecode;

final class ParseUriStaticNameHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri):string
    {
        if ($requestUri === '/') {
            $requestUri = substr($requestUri, 1);
        }
        if ($requestUri === '/meeting') {
            return MeetingController::class;
        }


        if (preg_match('#/meeting/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['id'] = urldecode($requestUriParams[2]);
            return ShowMeetingController::class;
        }
        if (preg_match('#/delete/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['id'] = urldecode($requestUriParams[2]);
            return MeetingController::class;
        }

        return IndexController::class;
    }
}
