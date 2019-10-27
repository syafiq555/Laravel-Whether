<?php

namespace App\Http\Controllers;

use App\Weathers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WeathersController extends Controller
{
    public function __construct() {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $weathers = Weathers::where(
            'created', 
            '>=', 
            Carbon::now()->subHours(23)
        )
            ->orderBy('created', 'desc')
            ->get();

        return view('home', compact('weathers'));
    }
}
