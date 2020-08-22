<?php


namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class ApplicationException extends HttpException
{
    public function __construct(string $message, int $code, Exception $previous = null)
    {
        parent::__construct($code, $message, $previous);
    }
}