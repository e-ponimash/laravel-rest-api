<?php

namespace App\Http\Controllers;

use App\Services\Places\PlacesService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * @param $event_id
     * @param PlacesService $placesService
     * @return array
     */
    public function index($event_id, PlacesService $placesService)
    {
        try {
            $places = $placesService->load($event_id);
            return response()->json(['places' => $places], 200);
        } catch (\Exception $exception){
            return response()->json(['errors'=>$exception->getMessage()], 500);
        }

    }

    /**
     * @param $event_id
     * @param Request $request
     * @param PlacesService $placesService
     * @return \Illuminate\Http\JsonResponse
     */
    public function reserve($event_id, Request $request, PlacesService $placesService)
    {
        try {
            $placesReserve = $placesService->reservePlace($event_id, $request->all());
            return response()->json($placesReserve, 201);
        } catch (\Exception $exception){
            return response()->json(['errors'=>$exception->getMessage()], 500);
        }
    }
}
