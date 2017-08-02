<?php
/**
* Insert arbitrary text into any place inside a text file
* from: http://www.learncomputer.com/php-insert-text-into-file-at-position/
*
* @param string $file_path - absolute path to the file
* @param string $insert_marker - a marker inside the file to
*	look for as a pattern match
* @param string $text - text to be inserted
* @param boolean $after - whether to insert text after (true)
*	or before (false) the marker. By default, the text is
*	inserted after the marker.
* @return integer - the number of bytes written to the file
*/
function insert_into_file($file_path, $insert_marker,
	$text, $after = true) {
	$contents = file_get_contents($file_path);
	$new_contents = preg_replace($insert_marker, ($after) ? '$0' . $text : $text . '$0', $contents);
	return file_put_contents($file_path, $new_contents);
}

// --------------------------------------------------
$file_path = "config/app.php";
$insert_marker = "/App\\\\Providers\\\\RouteServiceProvider::class,/";
$text = "";
$text .= "\n\n\t\t/*\n\t\t * Define Packages Service Providers...\n\t\t */";
$text .= "\n\t\tRecca0120\LaravelTracy\LaravelTracyServiceProvider::class,";
$text .= "\n\t\tCollective\Html\HtmlServiceProvider::class,";
$text .= "\n\t\tJeroenNoten\LaravelAdminLte\ServiceProvider::class,";
$text .= "\n\t\tCheweiHu\LaravelAdminLTELang\LaravelAdminLTELangServiceProvider::class,";
$text .= "\n\t\tCheweiHu\CRUDGeneratorTemplate\CRUDGeneratorTemplateServiceProvider::class,";

$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);

if ($num_bytes === false) {
	echo "Could not open file: $file_path.\n";
} else {
	echo "Insert \"Service Provider\" successful!\n";
}

// --------------------------------------------------
$insert_marker = "/Illuminate\\\\Support\\\\Facades\\\\View::class,/";
$text = "";
$text .= "\n\n\t\t/*\n\t\t * Define Packages Aliases...\n\t\t */";
$text .= "\n\t\t'Form' => Collective\Html\FormFacade::class,";
$text .= "\n\t\t'Html' => Collective\Html\HtmlFacade::class,";

$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);

if ($num_bytes === false) {
	echo "Could not open file: $file_path.\n";
} else {
	echo "Insert \"Aliases\" successful!\n";
}

// --------------------------------------------------
echo exec("php artisan vendor:publish --provider=\"Recca0120\\LaravelTracy\\LaravelTracyServiceProvider\"")."\n";
echo exec("php artisan vendor:publish --provider=\"Appzcoder\\CrudGenerator\\CrudGeneratorServiceProvider\"")."\n";
echo exec("php artisan vendor:publish --provider=\"JeroenNoten\\LaravelAdminLte\\ServiceProvider\" --tag=assets")."\n";
exec("php artisan make:adminlte");
echo exec("php artisan vendor:publish --provider=\"JeroenNoten\\LaravelAdminLte\\ServiceProvider\" --tag=config")."\n";
echo exec("php artisan vendor:publish --provider=\"JeroenNoten\\LaravelAdminLte\\ServiceProvider\" --tag=translations")."\n";
echo exec("php artisan vendor:publish --provider=\"JeroenNoten\\LaravelAdminLte\\ServiceProvider\" --tag=views")."\n";
echo exec("php artisan vendor:publish --provider=\"Appzcoder\\CrudGenerator\\CrudGeneratorServiceProvider\"")."\n";
echo exec("php artisan vendor:publish --provider=\"CheweiHu\\LaravelAdminLTELang\\LaravelAdminLTELangServiceProvider\"")."\n";
echo exec("php artisan vendor:publish --provider=\"CheweiHu\\CRUDGeneratorTemplate\\CRUDGeneratorTemplateServiceProvider\" --force")."\n";
