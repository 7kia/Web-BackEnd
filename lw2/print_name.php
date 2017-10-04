<?php
header('Content-Type: text/plain');
$name = isset($_GET ['name']) ? $_GET['name'] : '<There must be name>';
echo 'Hello, Dear ', $name , ' !';