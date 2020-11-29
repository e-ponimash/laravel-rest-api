<?php

namespace App\Http\Controllers;

use App\Services\Events\EventsService;
use App\Services\Shows\ShowsService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @param $show_id
     * @param EventsService $eventsService
     * @return bool
     */
    public function __invoke($show_id, EventsService $eventsService)
    {
        try{
            $events = $eventsService->load($show_id);
            return response()->json(['events'=>$events], 200);
        } catch (\Exception $exception){
            return response()->json(['errors'=>$exception->getMessage()], 500);
        }
    }
}
