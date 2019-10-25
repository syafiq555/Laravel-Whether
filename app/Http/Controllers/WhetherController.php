<?php

namespace App\Http\Controllers;

use App\Whether;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WhetherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whethers = Whether::where('created_at', '>=', Carbon::now()->subHours(24));
        dd($whethers);
    }
}
