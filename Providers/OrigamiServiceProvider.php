<?php
namespace App\Modules\Origami\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class OrigamiServiceProvider extends ServiceProvider
{
	/**
	 * Register the Kagi module service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		App::register('App\Modules\Origami\Providers\RouteServiceProvider');
//		App::register('App\Modules\Origami\Providers\OrigamiMenuProvider');

		$this->mergeConfigFrom(
			__DIR__.'/../Config/origami.php', 'origami'
		);

		$this->registerNamespaces();

// Broken .. not sure why yet ...
//		$this->registerConsoleCommands();

	}

	/**
	 * Register the module origami resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
//		Lang::addNamespace('origami', __DIR__.'/../Resources/Lang/');
		View::addNamespace('origami', __DIR__.'/../Resources/Views/');
	}

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../Config/origami.php' => config_path('origami.php'),
		]);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return string
	 */
/*
	public function provides()
	{
		return ['origami'];
	}
*/
	/**
	 * Register the package console commands.
	 *
	 * @return void
	 */
/*
	protected function registerConsoleCommands()
	{
		$this->registerInstallCommand();

		$this->commands([
			'origami.install'
		]);
	}
*/

	/**
	 * Register the "module:seed" console command.
	 *
	 * @return Console\ModuleSeedCommand
	 */
/*
	protected function registerInstallCommand()
	{
		$this->app->bindShared('origami.install', function() {
			return new App\Modules\Origami\Console\Commands\OrigamiCommand;
		});
	}
*/

}
