<?php


namespace App\Util\Response;


interface ResponseInterface
{
    public function serialize(object $model): string;
}