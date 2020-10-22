<?php

use C14r\Directus\Laravel\Directus;

if (! function_exists('directus')) {
    function directus(?string $connection = null)
    {
        return resolve('directus', ['connection' => $connection]);
    }
}
