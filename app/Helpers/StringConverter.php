<?php

namespace App\Helpers;

class StringConverter
{
    public function convertSnakeCaseToCamelCase(string $string): string
    {
        $stringSeparatedWithSpace = $this->replaceSeparatorWithSpace($string, '_');

        $upperCasedWordsString = $this->convertFirstCharacterOfEachWordToUpperCase($stringSeparatedWithSpace);

        $firstCharacterLowerCasedString = $this->convertFirstCharacterOfStringToLowerCase($upperCasedWordsString);

        return $this->removeSpaces($firstCharacterLowerCasedString);
    }

    public function replaceSeparatorWithSpace(string $string, string $separator): string
    {
        return str_replace($separator, ' ', $string);
    }

    public function convertFirstCharacterOfEachWordToUpperCase(string $string): string
    {
        return ucwords($string);
    }

    public function removeSpaces(string $string): string
    {
        return str_replace(' ', '', $string);
    }

    private function convertFirstCharacterOfStringToLowerCase(string $string)
    {
        $string[0] = strtolower($string[0]);

        return $string;
    }

    public function convertKebabCaseToUpperCase(string $string)
    {
        $stringSeparatedWithSpace = $this->replaceSeparatorWithSpace($string, '-');

        $upperCasedWordsString = $this->convertFirstCharacterOfEachWordToUpperCase($stringSeparatedWithSpace);

        return $this->removeSpaces($upperCasedWordsString);
    }
}
