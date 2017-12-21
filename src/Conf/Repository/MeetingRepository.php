<?php

declare(strict_types=1);

namespace Conf\Repository;


use Conf\Collection\MeetingCollection;
use Conf\Entity\Meeting;
use Conf\Exception\MeetingNotFoundException;
use PDO;

class MeetingRepository
{
    private $pdo;

    /**
     * MeetingRepository constructor.
     * @param $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll()
    {
        $result = $this->pdo->query('SELECT id, name, description, dateBegin, dateEnd
                                              FROM meetings');
        $meetings = [];
        while ($meeting = $result->fetch()) {
            $meetings[] = new Meeting($meeting['id'], $meeting['name'], $meeting['description'],
                $meeting['dateBegin'], $meeting['dateEnd']);
        }
        return new MeetingCollection(...$meetings);
    }

    //Récupération de chaque Meeting par ID pour affichage dans la page meeting-detail.phtml
    public function getMeetingById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM meetings WHERE id = '.$id);
        $statement->execute();

        $meeting = $statement->fetch();

        if (!$meeting) {
            throw new MeetingNotFoundException();
        }

        return new Meeting($meeting['id'], $meeting['name'], $meeting['description'],
           $meeting['dateBegin'], $meeting['dateEnd']);
    }

    //Requête qui permet d'effacer un meeting dans la BDD avec l'aide de la fonction deleteAction()
    //qui se trouve dans MeetingController.php
    public function deleteMeetingById()
    {
        $delete = $this->pdo->prepare('DELETE id FROM meetings');
        $delete->execute();
    }
}

