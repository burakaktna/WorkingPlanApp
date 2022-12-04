<?php

namespace App\Services\Contracts;

interface TaskProviderContract
{
    public function getTasks(): array;
}
