<?php

namespace App\Services\ApiProviders;

use App\Models\Provider;
use App\Services\Contracts\TaskProviderContract;
use Illuminate\Support\Facades\Http;

/**
 * @SuppressWarnings(PHPCS.CamelCasePropertyName)
 */
class USATaskProvider extends AbstractTaskProvider implements TaskProviderContract
{
    private string $url = 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7';
    private Provider $provider;

    public function __construct()
    {
        $this->provider = Provider::whereName('USA')->first();
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        $tasks = [];
        $response = Http::get($this->url)->json();
        foreach ($response as $task) {
            foreach ($task as $key => $value) {
                $tasks[] = [
                    'provider_id' => $this->provider->id,
                    'name' => $key,
                    'level' => $value['level'],
                    'estimated_duration' => $value['estimated_duration']
                ];
            }
        }
        return $tasks;
    }
}
