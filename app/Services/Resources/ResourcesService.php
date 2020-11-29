<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 16:44
 */

namespace App\Services\Resources;


interface ResourcesService
{
    public function getShows();

    public function getEventsByShow(int $show);

    public function getPlacesByEvent(int $event);

    public function getPlacesReserve( int $event_id,string $name,array $places );
}