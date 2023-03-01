<?php

namespace App\Facades;

use App\Services\CalculatorService;
use Illuminate\Support\Facades\Facade;

/**
 * Class Authenticated
 * @package App\Facades
 * @method static CalculatorService run()
 * @method static array calculateWorkingPlan(array $schedules)
 */
class Calculator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CalculatorService::class;
    }
}
