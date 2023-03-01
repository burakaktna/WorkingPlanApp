<?php

namespace App\Services\ApiProviders;

use App\Models\Provider;

abstract class AbstractTaskProvider
{
    abstract public function __construct();
    abstract public function getTasks(): array;
}
