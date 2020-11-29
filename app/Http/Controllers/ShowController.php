<?php

namespace App\Http\Controllers;

use App\Services\Shows\ShowsService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * @param ShowsService $showsService
     * @return mixed
     */
    public function __invoke(ShowsService $showsService){
        try {
            $shows = $showsService->load();
            return response()->json(['shows'=>$shows], 200);
        } catch (\Exception $exception){
            return response()->json(['errors'=>$exception->getMessage()], 500);
        }

    }
}
