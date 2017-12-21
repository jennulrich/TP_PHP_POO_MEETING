<?php

declare(strict_types=1);

namespace Conf\Entity;

final class Meeting
{

    /**
     * @var string
     */
    private $id;
    private $name;
    private $description;
    private $dateBegin;
    private $dateEnd;

    /**
     * Meeting constructor.
     * @param string $name
     * @param string $description
     * @param string $dateBegin
     * @param string $dateEnd
     */
    public function __construct($id, $name, $description, $dateBegin, $dateEnd)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->dateBegin = $dateBegin;
        $this->dateEnd = $dateEnd;
    }

    public function getId(){
        return $this->id;
    }


    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    /**
     * @return string
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }
}