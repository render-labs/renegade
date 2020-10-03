<?php

namespace RenderLabs\Renegade;

use Illuminate\Support\ServiceProvider;

class RenegadeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'renegade');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'renegade');
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('renegade.php'),
            ], 'config');

            if (!class_exists('CreatePostsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php')
                ], 'migrations');
            }

            if (!class_exists('Post')) {
                $this->publishes([
                    __DIR__ . '/Models/Post.php' => app_path('/Models/Post.php')
                ]);
            }

            if (!class_exists('PostController')) {
                $this->publishes([
                    __DIR__ . '/Http/Renegade/PostController.php' => app_path('/Http/Controllers/Renegade/PostController.php')
                ]);
            }

            if (!class_exists('DashboardController')) {
                $this->publishes([
                    __DIR__ . '/Http/Renegade/DashboardController.php' => app_path('/Http/Controllers/Renegade/DashboardController.php')
                ]);
            }

            // Delete routes files and publish renegades routes
            unlink(bash_path('routes/') . 'web.php');
            unlink(bash_path('routes/') . 'api.php');

            $this->publishes([
                __DIR__ . '/../routes/web.php' => bash_path('routes/') . 'web.php'
            ]);
            $this->publishes([
                __DIR__ . '/../routes/api.php' => bash_path('routes/') . 'api.php'
            ]);

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/renegade'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/renegade'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/renegade'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'renegade');

        // Register the main class to use with the facade
        $this->app->singleton('renegade', function () {
            return new Renegade;
        });
    }
}
