<?php

namespace RenderLabs\Renegade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RenderLabs\Renegade\Skeleton\SkeletonClass
 */
class RenegadeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'renegade';
    }
}
