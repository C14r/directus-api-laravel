<?php

use C14r\Directus\Laravel\Directus;

if (! function_exists('directus')) {
    function directus(?string $connection = null)
    {
        if (is_null($connection)) {
            $connection = config('directus.default', 'default');
        }

        return Directus::getInstance($connection);
    }
}
