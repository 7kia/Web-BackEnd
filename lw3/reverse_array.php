<?php
header('Content-Type: text/html');

const ARG_COUNT = 1;

function getParamFromGetRequest($arg_name)
{
    if(isset($_GET[$arg_name]))
    {
        return $_GET[$arg_name];
    }
    
    throw new InvalidArgumentException($arg_name);
}

function swap(&$first,&$second) {
    $tmp=$first;
    $first=$second;
    $second=$tmp;
}

function reverse($array)
{
    if(empty($array))
    {
        header('HTTP/1.0 400');
        throw new Exception('Массив пустой!');       
    }
    else
    {
		if(gettype($array) != 'array')
		{
			throw new Exception('В функцию reverse передан не массив');
		}

		$arraySize = count($array);
		for ($i = 0; $i < ($arraySize / 2); ++$i) {
			swap($array[$i], $array[$arraySize - 1 - $i]);
		}
        print_r($array);
    }
}

try
{
    if(count($_GET) != ARG_COUNT)
    {
        header('HTTP/1.0 400');
        throw new Exception('Используй: arr=<number>,<number>...');
    }

    print reverse(explode(',', getParamFromGetRequest('arr')));
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