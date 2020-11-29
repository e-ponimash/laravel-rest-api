<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 17:37
 */

namespace App\Services\Events;

use App\Entity\Event;
use App\Services\Resources\ResourcesService;

class EventsService
{
    /**
     * @var ResourcesService
     */
    protected $client;

    /**
     * ShowsService constructor.
     * @param ResourcesService $client
     */
    public function __construct(ResourcesService $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $show_id
     * @return mixed
     */
    public function getEventsById($show_id, $id){
        $events = $this->load($show_id);

        return $events[$id];
    }

    /**
     * @param int $show_id
     * @return array
     */
    public function load(int $show_id){
        $data = $this->client->getEventsByShow($show_id);
        $events = array();
        foreach ($data as $item){
            $event = new Event($item->id, $item->showId, $item->date);
            $events[$item->id] = $event;
        }
        return $events;
    }
}