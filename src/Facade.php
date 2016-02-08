<?php

namespace Srph\LaravelAntiSpam;

use Illuminate\Support\Facades;

/**
 * @see \Illuminate\Routing\Redirector
 */
class AntiSpam extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'antispam';
    }
}
