<?php namespace App\Providers;

use App\Http\Controllers\api\v1_0\ApiAuthController;
use App\Http\Controllers\TestController;
use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Http;

class AnnotationsServiceProvider extends ServiceProvider {
    // WARNING ! UNSTABLE ! SELF ADDED LARAVEL 8 SUPPORT (FROM DEAN R. https://github.com/deanomus/annotations )

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        TestController::class,
        ApiAuthController::class,
    ];

    /**
     * The classes to scan for model annotations.
     *
     * @var array
     */
    protected $scanModels = [];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = false;

    /**
     * Determines whether or not to automatically scan the controllers
     * directory (App\Http\Controllers) for routes
     *
     * @var bool
     */
    protected $scanControllers = false; // NOT WORKING :( (Cause of unnofficial support)

    /**
     * Determines whether or not to automatically scan all namespaced
     * classes for event, route, and model annotations.
     *
     * @var bool
     */
    protected $scanEverything = false;
}
