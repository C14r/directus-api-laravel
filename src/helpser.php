<?php

use C14r\Directus\Laravel\Directus;

if (! function_exists('directus')) {
    function directus(?string $connection = null)
    {
        $connection ?: config('directus.default', 'default');

        return Directus::getInstance($connection);
    }
}
