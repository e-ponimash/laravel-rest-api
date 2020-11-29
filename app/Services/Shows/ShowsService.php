<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 17:17
 */

namespace App\Services\Shows;

use App\Entity\Show;
use App\Services\Resources\ResourcesService;

class ShowsService
{
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
     * @return mixed
     */
    public function load(){
        $data = $this->client->getShows();
        $shows = array();
        foreach ($data as $item){
            $shows[$item->id] = new Show($item->id, $item->name);
        }
        return $shows;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getShowBy($id){
        $shows = $this->load();
        return $shows[$id];
    }

}