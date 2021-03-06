<?php

namespace Monicahq\Cloudflare\Tests;

use Illuminate\Http\Request;
use Monicahq\Cloudflare\TrustedProxyServiceProvider;
use Orchestra\Testbench\TestCase;

class FeatureTestCase extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('trustedproxy.headers', Request::HEADER_X_FORWARDED_ALL);
    }

    protected function getPackageProviders($app)
    {
        return [
            TrustedProxyServiceProvider::class,
        ];
    }

    protected function resolveApplicationCore($app)
    {
        parent::resolveApplicationCore($app);

        $app->detectEnvironment(function () {
            return 'testing';
        });
    }
}
