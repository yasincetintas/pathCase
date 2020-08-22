<?php


namespace App\Util\Request;


interface RequestModelInterface
{
    public function validate(string $data, string $model): object;
}