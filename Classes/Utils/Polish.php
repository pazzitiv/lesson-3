<?php


namespace Utils;


class Polish implements Parser
{
    public static function Parse(array $lexems): string
    {
        $result = '';
        $stack = [];

        foreach ($lexems as $lexem) {
            switch ($lexem) {
                case ".":
                case is_numeric($lexem):
                    $result .= $lexem;
                    break;
                case '(':
                case '-':
                case '+':
                case '*':
                case '/':
                    while (count($stack) !== 0 && array_search('*', $stack) && array_search('/', $stack)) {
                        $result .= array_pop($stack);
                    }
                    $stack[] = $lexem;
                    break;
                case ')':
                    while (count($stack) !== 0 && end($stack) != '(') {
                        $result .= array_pop($stack);
                    }
                    array_pop($stack);
                    break;
            }
        }

        while (count($stack) !== 0) {
            $result .= array_pop($stack);
        }

        return $result;
    }
}
