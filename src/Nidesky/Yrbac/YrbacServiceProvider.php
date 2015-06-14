<?php namespace Nidesky\Yrbac;

use Illuminate\Support\ServiceProvider;
use Nidesky\Yrbac\Yrbac;

class YrbacServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../../migrations/create_yrbac_tables.php' => database_path('/migrations/'.date('Y_m_d_His').'_create_yrbac_tables.php')
        ], 'migrations');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Yrbac', function()
        {
            return new Yrbac();
        });
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
