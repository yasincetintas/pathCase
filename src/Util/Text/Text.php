<?php


namespace App\Util\Text;


class Text implements TextInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function makeSnakeCase(string $text): string
    {
        if (!trim($text)) {
            return $text;
        }

        return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $text));
    }
}