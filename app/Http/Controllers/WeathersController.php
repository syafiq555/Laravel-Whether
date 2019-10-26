<?php

namespace App\Http\Controllers;

use App\MetaWhether\API;
use App\Weathers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WeathersController extends Controller
{
    private $api;
    public function __construct() {
       $this->api = new API; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->fetchWeathersAPI();
        $weathers = Weathers::where(
            'created', 
            '>=', 
            Carbon::now()->subHours(23)
        )
            ->orderBy('created', 'desc')
            ->get();

        return view('home', compact('weathers'));
    }

    public function fetchWeathersAPI() {
        $response = $this->api->get();
        $responseCollections = collect($response->consolidated_weather);

        foreach ($responseCollections as $responseCollection) {
            $weather = new Weathers([
                'min_temp' => $responseCollection->min_temp,
                'max_temp' => $responseCollection->max_temp,
                'created' => $responseCollection->created,
                'icon' => $responseCollection->weather_state_abbr,
                'abbr' => $responseCollection->weather_state_name,
            ]);
            $weather->save();
        }
        
    }
}
