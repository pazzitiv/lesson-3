<?php

spl_autoload_register(function ($class_name) {
    include "./Classes/" . $class_name . '.php';
});

use Utils\SortStation;
use Utils\Polish;

if (PHP_SAPI === 'cli') {
    $SortStation = new SortStation(fgets(STDIN));
    $SortStation->parseLexems();
    echo Polish::Parse($SortStation->getLexems());
} else {
    die("Is cli-based application.");
}
