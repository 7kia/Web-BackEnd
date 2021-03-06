﻿<?php
header('Content-Type: text/html');

const ARG_COUNT = 3;
const OPERATION_ARGUMENT_NAME = 'operation';

function getParamFromGetRequest($arg_name)
{
    if(isset($_GET[$arg_name]))
    {
        return $_GET[$arg_name];
    }
    
    throw new InvalidArgumentException($arg_name);
}

function getNumberFromGetRequest($arg_name)
{
    $number = GetParamFromGetRequest($arg_name);
    if(is_numeric($number))
    {
        return intval($number);
    }
    throw new UnexpectedValueException($arg_name);
}

function calculateResult(
	$operationType,
	$firstNumber,
	$secondNumber
)
{
    switch($operationType)
    {
    case "add":
        return $firstNumber + $secondNumber;
    case "sub":
        return $firstNumber - $secondNumber;
    case "mul":
        return $firstNumber * $secondNumber;
        break;
    case "div":
        if($secondNumber === 0)
        {
            throw new Exception("На ноль делить нельзя!");
        }
        return $firstNumber / $secondNumber;
    default:
        throw new UnexpectedValueException(OPERATION_ARGUMENT_NAME);
    }
}

try
{
    if(count($_GET) != ARG_COUNT)
    {
        throw new Exception(
			'Должны быть следующие аргументы: 
			arg1(число) agr2(число) operation("add"/"mul"/"div"/"sub")'
		);
    }

    echo calculateResult(
		getParamFromGetRequest(OPERATION_ARGUMENT_NAME),
		getNumberFromGetRequest('arg1'),
        getNumberFromGetRequest('arg2')
	);
}
catch (InvalidArgumentException $e)
{
    echo 'Ошибка, не передан аргумент ' . $e->getMessage() , '!';
}
catch (UnexpectedValueException $e)
{
    echo 'Аргумент ' . $e->getMessage() . ' имеет неккоректное значение!';
}
catch (Exception $e)
{
    echo $e->getMessage();
}