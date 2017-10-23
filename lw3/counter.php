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

try
{
    if(count($_GET) != ARG_COUNT) {
        header('HTTP/1.0 400');
        throw new Exception('Используй: <stirng>:string');
    }
	$text = preg_split(
		'//u',
		mb_strtolower(
			getParamFromGetRequest('string'),
			'UTF-8'
		),
		-1,
		PREG_SPLIT_NO_EMPTY
	);
    print_r(
        array_count_values(
            $text
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
