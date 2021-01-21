<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function index($id)
    {
        $activities = Activity::with('activitable')->where('user_id', $id)->get();

        // return $activities;

        return view('activity-feed', [
            'activities' => $activities
        ]);
    }
}
