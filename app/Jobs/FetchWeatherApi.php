<?php

namespace App\Jobs;

use App\MetaWhether\API;
use App\Weathers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchWeatherApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api = new API;
        $response = $api->get();
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
