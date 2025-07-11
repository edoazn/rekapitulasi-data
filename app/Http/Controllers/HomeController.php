<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the landing page
     */
    public function index(): View
    {
        // Sample statistics data - you can replace this with real data from your models
        $statistics = [
            'total_data' => 15420,
            'total_services' => 45,
            'reporting_period' => 12,
            'active_users' => 125
        ];

        return view('home.landing', compact('statistics'));
    }
}
