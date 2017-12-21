<?php

declare(strict_types=1);

namespace Conf\Controller;

use Conf\Repository\MeetingRepository;


final class MeetingController
{

    /**
     * @var string meeting_repository
     */
    private $meetingRepository;

    /**
     * MeetingController constructor.
     * @param string $meeting_repository
     */
    public function __construct(MeetingRepository $MeetingRepository)
    {
        $this->meetingRepository = $MeetingRepository;
    }

    public function indexAction()
    {

        $meetings = $this->meetingRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../views/meeting.phtml';
        return ob_get_clean();
    }

    public function deleteAction()
    {
        //echo "id: " . $_GET['id'];
        //return MeetingRepository::deleteMeetingById();
    }
}