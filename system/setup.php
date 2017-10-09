<?
session_start();

if (AMBIENTE == 'producao') {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

require_once ('system.php');
require_once ('controller.php');
require_once ('model.php');

/* 	Models	 */
$scanModels = scandir(MODELS);
array_shift($scanModels);
array_shift($scanModels);
foreach ($scanModels as $key => $model) {
    if (file_exists(MODELS . $model)) {
        require_once (MODELS . $model);
    } else {
        die("Model não existe. =>" . MODELS . $model);
    }
}

/* 	Helpers	 */
$scanHelpers = scandir(HELPERS);
array_shift($scanHelpers);
array_shift($scanHelpers);
foreach ($scanHelpers as $key => $helper) {
    if (file_exists(HELPERS . $helper)) {
        require_once (HELPERS . $helper);
    } else {
        die("Helper não existe. =>" . HELPERS . $helper);
    }
}
$start = new System;
$start->run();
