<?php

namespace C14r\Directus\Laravel;

use C14r\Directus\API;

class Directus extends API
{
    private static array $instances = [];

    public function __construct(?string $connection = null)
    {
        if (is_null($connection)) {
            $connection = config('directus.default', 'default');
        }

        $base_url = config('directus.connections.' . $connection . '.base_url');
        $project = config('directus.connections.' . $connection . '.project');
        $token = config('directus.connections.' . $connection . '.api_key');
        $username = config('directus.connections.' . $connection . '.username', '');
        $password = config('directus.connections.' . $connection . '.password', '');

        parent::__construct($base_url, $project);

        if ($token) {
            $this->token($token);
        } elseif ($username and $password) {
            $this->authenticate($username, $password);
        }
    }

    public static function getInstance(?string $connection = null)
    {
        if (!isset(static::$instances[$connection])) {
            static::$instances[$connection] = new static($connection);
        }
        return static::$instances[$connection];
    }
}
