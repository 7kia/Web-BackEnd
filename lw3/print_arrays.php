<?php

header('Content-Type: text/plain');
$simpleNumberArray = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29);
$functionInfos = array(
        'count' => 'Возвращает количество элементов массива.',
        'is_array' => 'Определяет, является ли переменная массивом.',
        'array_merge' => 'Сливает один или большее количество массивов.',
        'empty' => 'Проверяет, пуста ли переменная.',
        'print_r' => 'Выводит пригодную для чтения человеком информацию о переменной.'
);
$matrix = array(
	array(1, 0, 0, 0),
	array(0, 1, 0, 0),
	array(0, 0, 1, 0),
	array(0, 0, 0, 1),
);
echo print_r($simpleNumberArray);
echo print_r($functionInfos);
echo print_r($matrix);