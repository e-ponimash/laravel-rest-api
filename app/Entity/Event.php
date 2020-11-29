<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 20:03
 */

namespace App\Entity;
use DateTime;
use JsonSerializable;

class Event implements JsonSerializable
{
    private $id;
    private $showId;
    private $date;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Event constructor.
     * @param $id
     * @param $showId
     * @param $date
     */
    public function __construct($id, $showId, $date)
    {
        $this->id = $id;
        $this->showId = $showId;
        $this->date = new DateTime($date);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getShow(): int
    {
        return $this->showId;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize() {
        return [
            'id' => $this->getId(),
            'show' => $this->getShow(),
            'date' => $this->getDate()->format('Y-m-d H:i:s')
        ];
    }
}