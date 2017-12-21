<?php
declare(strict_types=1);

namespace Conf\Collection;

use Conf\Entity\Meeting;
use ArrayIterator;
use Iterator;
use IteratorIterator;

final class MeetingCollection extends IteratorIterator implements Iterator
{

    /**
     * MeetingCollection constructor.
     */
    public function __construct(Meeting ...$meetings)
    {
        parent::__construct(new ArrayIterator($meetings));
    }

    public function current()
    {
        return parent::current();
    }
}