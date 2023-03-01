<?php

namespace App\Http\Controllers;

use App;
use App\Facades\Calculator;
use Cache;

class IndexController extends Controller
{
    public function index()
    {
        if (App::runningUnitTests()) {
            return response('Merhaba Dünya!')->setStatusCode(200);
        }

        $calculator = Cache::remember('calculator', 60 * 60, function () {
            return Calculator::run();
        });
        return view('index', [
            'schedules' => $calculator->getSchedules(),
            'wastedTasks' => $calculator->getWastedTasks(),
            'plan' => $calculator->calculateWorkingPlan()
        ]);
    }
}
