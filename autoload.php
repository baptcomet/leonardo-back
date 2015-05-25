<?php

/*
 * Fonction utile Debug
 */
function debug($var){
    ob_start();
    var_dump($var);
    $output = ob_get_clean();
    $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
    echo('<pre>' . $output . '</pre>');
    die();
}

/*
 * Configuration
 */
define("ENV", "dev"); // dev ou prod
define("OS", "windows"); // windows ou linux
define("APPLICATION_PATH", realpath(dirname(__FILE__)));

/*
 * Durée maximum d'éxécution
 */
ini_set('max_execution_time', 240);
ini_set('memory_limit', '512M');

/*
 * Autoloader
 */
spl_autoload_register(
    function ($class) {
        // The project namespace prefix
        $prefix = 'JacaDanseBack\\';
        // Does the class match the namespace prefix?
        if (strncmp($prefix, $class, strlen($prefix)) === 0) {
            // Filename relative to the namespace path
            $relative = substr($class, strlen($prefix));
            // Build the path to the file containing the class
            $file = __DIR__ . '/src/' . str_replace('\\', '/', $relative) . '.php';
            if (is_readable($file)) include $file;
        }
    }
);