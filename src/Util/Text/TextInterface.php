<?php


namespace App\Util\Text;


interface TextInterface
{
    public function makeSnakeCase(string $text): string;
}