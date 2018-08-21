<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
//         $url    = 'https://www.nseindia.com/content/historical/DERIVATIVES/2017/OCT/fo24OCT2017bhav.csv.zip';
//         $url = 'http://gitea.funpodium.net/funpodium/mobile-service/archive/v1.8.5.zip';
//         $url = 'http://gitea.funpodium.net/funpodium/mobile-service/archive/v1.8.5.tar.gz';
// $url = 'https://github.com/pingpong-labs/menus/archive/v2.2.1.zip';
// $guzzle = new \GuzzleHttp\Client();
// $response = $guzzle->get($url);
// $file_path = resource_path('views/modules/blog').'/csvfile2.zip';
// file_put_contents($file_path, $response->getBody());
// \Storage::put($file_path, $response->getBody());
// \Storage::put('csvfile3.zip', $response->getBody());
// \Storage::put('csvfile2.zip', $url);
        // ========
        // $url = 'http://gitea.funpodium.net/funpodium/mobile-service/archive/v1.8.5.zip';
        // // $url = 'https://github.com/w19900227';
        // $file_path = __DIR__.'/../Resources/views/test.zip';

        // $file_path = fopen($file_path,'w');
        // $client = new \GuzzleHttp\Client();
        // // $response = $client->get($url);
        // $response = $client->get($url, ['save_to' => $file_path]);
        // dd($response->getStatusCode());
        // $response = $client->get($url, ['save_to' => $file_path]);
        // \Storage::put('test.zip', $response->getBody());
    // $stream = Stream::factory($file->getBody()->__toString());

    // $dest = Stream::factory($local);

    // $dest->write($stream);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('blog.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'blog'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/blog');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/blog';
        }, \Config::get('view.paths')), [$sourcePath]), 'blog');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/blog');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'blog');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'blog');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
