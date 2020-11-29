<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 16:44
 */

namespace App\Services\Resources;


use Exception;
use GuzzleHttp\Client;

class ResourceJsonService implements ResourcesService
{
    private $client;

    /**
     * ResourceJsonService constructor.
     */
    public function __construct(){
        $this->client = new Client(config('places_reserve.uri'));
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exception
     */
    public function getShows(){

        $response = $this->client->request('GET', 'shows', [
                config('show.headers')
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Не может получить данные с сервера');
        }

        $data = json_decode($response->getBody());
        return $data->response;
    }

    /**
     * @param int $show_id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exception
     */
    public function getEventsByShow(int $show_id){//Использовать

        $response = $this->client->request('GET', "shows/$show_id/events", [
            config('show.headers')
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Не может получить данные с сервера');
        }
        $data = json_decode($response->getBody());

        return $data->response;
    }

    /**
     * @param $event_id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exception
     */
    public function getPlacesByEvent(int $event_id){
        $response = $this->client->request('GET', "events/$event_id/places", [
            config('show.headers')
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Не может получить данные с сервера');
        }

        $data = json_decode($response->getBody());

        return $data->response;
    }

    /**
     * @param int $event_id
     * @param string $name
     * @param array $places
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exception
     */
    public function getPlacesReserve(int $event_id, string $name, array 	$places){
        $response = $this->client->request('POST', "events/$event_id/events", [
            'form_params' => [
                'name' => $name,
                'places' => $places
            ],
            config('show.headers')
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Не может получить данные с сервера');
        }

        $data = json_decode($response->getBody());

        return $data->response;
    }
}