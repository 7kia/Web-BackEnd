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


function bubbleSort($array)
{
	if(empty($array))
    {
        header('HTTP/1.0 400');
        throw new Exception('Массив пустой!');       
    }

	$sortArray = $array;
    $count = count($sortArray);
    for ($j = 1; $j < $count; $j++)
    {
        for ($i = 1; $i < ($count - $j + 1); $i++)
        {
            if ($sortArray[$i-1] > $sortArray[$i])
            {
                swap($sortArray[$i-1], $sortArray[$i]);
            }
        }
    }
    return $sortArray;
}

try
{
    if(count($_GET) != ARG_COUNT)
    {
        http_response_code(400);
        throw new Exception('Используй: <numbers>:number,number...');
    }

	$numericArray = explode(',', getParamFromGetRequest('numbers'));
	foreach($numericArray as &$value)
	{
		if(!is_numeric($value))
		{
			throw new Exception('В массиве не все элементы числа');
		}
	}

    echo implode(', ', bubbleSort($numericArray));
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