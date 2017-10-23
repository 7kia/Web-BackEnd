<?php
header('Content-Type:text/html; charset=utf-8');
if($argc > 1) {
    echo 'Number of arguments: ', $argc - 1, PHP_EOL, 'Arguments: ';
    for ($i=1; $i < $argc; $i++) {
        echo $argv[$i], ', ';
    }
}
else {
    echo 'No parameters were specified!';
}
