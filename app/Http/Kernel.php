<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
			'rolewaredashboard' => 'App\Http\Middleware\Managedashboard',
		'roleware6' => 'App\Http\Middleware\Manageuserswarerole6',
		'roleware5' => 'App\Http\Middleware\Manageuserswarerole5',
		'roleware3' => 'App\Http\Middleware\Manageuserswarerole3',
		'roleware4' => 'App\Http\Middleware\Manageuserswarerole4',

		'roleware2' => 'App\Http\Middleware\Manageuserswarerole2',
		'roleware' => 'App\Http\Middleware\Manageusersware',
	];

}
