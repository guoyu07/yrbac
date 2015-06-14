<?php namespace Nidesky\Yrbac;

use Illuminate\Support\ServiceProvider;

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
		$this->package('nidesky/yrbac');
        $this->publishes([
            __DIR__.'/../database/migrations/create_yrbac_tables.php' => database_path('/migrations/'.date('Y_m_d_His').'_create_yrbac_tables.php')
        ], 'migrations');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
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
