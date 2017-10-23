<?php
header('Content-Type:text/html; charset=utf-8');
const ARG_COUNT = 1;

function getParamFromGetRequest($arg_name)
{
    if(isset($_GET[$arg_name])) {
        return $_GET[$arg_name];
    }
    
    throw new InvalidArgumentException($arg_name);
}

function translate($word)
{
    $translations = array(
        'Keyboard' => 'Клавиатура',
        'String' => 'Строка',
        'Input' => 'Ввод',
        'Output' => 'Вывод',
        'Split' => 'Разделить',
        'Implode' => 'Сжать'
    );

    $translation = array_key_exists($word, $translations) 
		? $translations[$word]
		: NULL;

    if(empty($translation)) {
        $translation = in_array($word, $translations) 
                ? array_search($word, $translations)	
                : NULL;
    }

    if(empty($translation)) {
        header('HTTP/1.0 404');
        throw new Exception('Не найден перевод для слова "' . $word . '"');
    }
    else {  
        if(is_array($translation)) {
            $translation = $translation[0];
        }
        echo $translation;
    }
}

try
{
    if(count($_GET) != ARG_COUNT) {
		header('HTTP/1.0 400');
        throw new Exception('В качестве аргумента укажите: word=<Слово>');
    }

    echo translate(getParamFromGetRequest('word'));
}
catch (InvalidArgumentException $e)
{
    header('HTTP/1.0 400');
    echo 'Ошибка, не передан аргумент ' . $e->getMessage() . '.';
}
catch (Exception $e)
{
    echo $e->getMessage();
}
