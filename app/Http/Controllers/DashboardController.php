<?php

namespace App\Http\Controllers;

use App\Models\InstantCode;
use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::orderByDesc('last_login_time')->orderByDesc('created_at')->get(),
            'counts' => [
                'manufacturers' => Manufacturer::count(),
                'instant_codes' => InstantCode::count(),
            ],
        ];

        return view('dashboard', $data);
    }
}
