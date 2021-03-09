<?php


namespace Utils;


class SortStation
{
    private string $rawFormula;
    private array $lexems = [];

    /**
     * SortStation constructor.
     * @param string $rawFormula
     */
    public function __construct(string $rawFormula)
    {
        $this->rawFormula = trim($rawFormula);
    }

    public function parseLexems(): SortStation
    {
        for ($i = 0; $i < strlen($this->rawFormula); $i++) {
            $lexem = $this->rawFormula[$i];
            if (
                is_numeric($lexem) ||
                $lexem == "(" ||
                $lexem == ")" ||
                $lexem == "+" ||
                $lexem == "-" ||
                $lexem == "*" ||
                $lexem == "/" ||
                $lexem == "."
            ) {
                $this->lexems[] = $lexem;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getLexems(): array
    {
        return $this->lexems;
    }
}
