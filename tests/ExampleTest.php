<?php

namespace RenderLabs\Renegade\Tests;

use Orchestra\Testbench\TestCase;
use RenderLabs\Renegade\RenegadeServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [RenegadeServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
