<?php

namespace App\Services\ApiProviders;

use App\Models\Provider;
use App\Services\Contracts\TaskProviderContract;
use Illuminate\Support\Facades\Http;

class TurkeyTaskProvider implements TaskProviderContract
{
    private string $url = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';
    private Provider $provider;

    public function __construct()
    {
        $this->provider = Provider::whereName('TR')->first();
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        $tasks = [];
        $response = Http::get($this->url)->json();
        foreach ($response as $task) {
            $tasks[] = [
                'provider_id' => $this->provider->id,
                'name' => $task['id'],
                'level' => $task['zorluk'],
                'estimated_duration' => $task['sure']
            ];
        }
        return $tasks;
    }
}
