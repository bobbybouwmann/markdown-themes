<?php

namespace Bobbybouwmann\Markdown;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->defineAssetPublishing();
    }

    /**
     * Register the Markdown web routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'markdown',
            'namespace' => 'Bobbybouwmann\Markdown\Http\Controllers',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
        });
    }

    /**
     * Register the Horizon resources.
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'markdown');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function defineAssetPublishing()
    {
        $this->publishes([
            MARKDOWN_PATH . '/public' => public_path('vendor/horizon'),
        ], 'markdown-assets');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!defined('MARKDOWN_PATH')) {
            define('MARKDOWN_PATH', realpath(__DIR__ . '/../'));
        }
    }
}
