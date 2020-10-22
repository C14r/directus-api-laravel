<?php

namespace C14r\Directus\Laravel;

use C14r\Directus\API;
use Illuminate\Support\Arr;

class Directus extends API
{
    private static array $instances = [];

    public function __construct(?string $connection = null)
    {
        if (is_null($connection)) {
            $connection = config('directus.default', 'default');
        }

        $config = config('directus.connections.' . $connection, []);

        $base_url = Arr::get($config, 'base_url', '');
        $project = Arr::get($config, 'project', '');
        $token = Arr::get($config, 'api_key', null);
        $username = Arr::get($config, 'username', null);
        $password = Arr::get($config, 'password', null);

        parent::__construct($base_url, $project);

        if ($token) {
            $this->token($token);
        } elseif ($username and $password) {
            $this->authenticate($username, $password);
        }
    }

    public static function getInstance($connection = null)
    {
        if (is_array($connection) && isset($connection['connection'])) {
            $connection = $connection['connection'];
        }
        elseif(is_array($connection))
        {
            $connection = null;
        }

        if (!isset(static::$instances[$connection])) {
            static::$instances[$connection] = new static($connection);
        }
        return static::$instances[$connection];
    }
}
