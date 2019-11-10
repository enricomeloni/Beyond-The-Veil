<?php
/**
 * @var mixed $PARAMETERS config options
 */

	require_once (__DIR__.'/../vendor/autoload.php');
	require_once(__DIR__.'/constant_values.inc.php');
	require_once(__DIR__.'/../config.inc.php');
	require_once(__DIR__.'/../vocabulary/'.$PARAMETERS['languages']['set'].'.vocabulary.php');
 	require_once(__DIR__.'/functions.inc.php');

 	use Illuminate\Database\Capsule\Manager;
	$capsule = new Manager();



	$capsule->addConnection([

		"driver" => "mysql",

		"host" => $PARAMETERS['database']['url'],

		"database" => $PARAMETERS['database']['database_name'],

		"username" => $PARAMETERS['database']['username'],

		"password" => $PARAMETERS['database']['password']

	]);

	//Make this Capsule instance available globally.
	$capsule->setAsGlobal();

	// Setup the Eloquent ORM.
	$capsule->bootEloquent();
	$capsule->bootEloquent();
?>
