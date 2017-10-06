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

try
{
    if(count($_GET) != ARG_COUNT)
    {
        header('HTTP/1.0 400');
        throw new Exception('Используй: <stirng>:string');
    }
    print_r(
		array_count_values(
			str_split(
				strtolower(
					getParamFromGetRequest('string')
				)
			)
		)
	);
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