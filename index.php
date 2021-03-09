<?php

spl_autoload_register(function ($class_name) {
    include "./Classes/" . $class_name . '.php';
});

use Utils\SortStation;
use Utils\Polish;

if (PHP_SAPI === 'cli') {
    $SortStation = new SortStation(fgets(STDIN));
    $lexems = $SortStation
        ->parseLexems()
        ->getLexems();
    echo Polish::Parse($lexems) . "\n";
    echo eval("return " . $SortStation->getFormula() . ";");
} else {
    die("Is cli-based application.");
}
