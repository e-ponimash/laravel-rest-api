<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 22:18
 */

namespace App\Services\Places;

use App\Entity\Place;
use App\Services\Resources\ResourcesService;

class PlacesService
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
     * @param int $event_id
     * @param int $id
     * @return mixed
     */
    public function getPlacesByEvent(int $event_id, int $id){
        $events = $this->load($event_id);
        return $events[$id];
    }

    /**
     * @param int $event_id
     * @return array
     */
    public function load(int $event_id){
        $data = $this->client->getPlacesByEvent($event_id);
        $places = array();
        foreach ($data as $item){
            $place = new Place($item->id, $item->x, $item->y, $item->width, $item->height, $item->is_available);
            $places[$item->id] = $place;
        }
        return $places;
    }

    /**
     * @param int $event_id
     * @param string $name
     * @param array $places
     */
    public function reservePlace(int $event_id, string $name,	array $places){
        return $this->client->getPlacesReserve($event_id, $name,	$places);
    }

}