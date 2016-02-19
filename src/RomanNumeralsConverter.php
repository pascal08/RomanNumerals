<?php

class RomanNumeralsConverter
{

    /**
     * @var array
     */
    private static $romans = [
        1000 => 'M',
        900  => 'CM',
        500  => 'D',
        400  => 'CD',
        100  => 'C',
        90   => 'XC',
        50   => 'L',
        40   => 'XL',
        10   => 'X',
        9    => 'IX',
        5    => 'V',
        4    => 'IV',
        1    => 'I',
    ];

    /**
     * @var array
     */
    private static $numbers = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    public function addRomanNumerals($romans)
    {
        if(!is_array($romans))
        {
            throw new \InvalidArgumentException;
        }

        return array_sum(array_map(array($this, 'convertToNumber'), $romans));
    }


    /**
     * @param $number
     * @return string
     */
    public function convertToRoman($number)
    {
        $this->validateNumber($number);

        $solution = '';

        foreach (static::$romans as $limit => $glyph)
        {
            while ($number >= $limit)
            {
                $solution .= $glyph;
                $number -= $limit;
            }
        }

        return $solution;
    }

    /**
     * @param $number
     * @throws Exception
     */
    private function validateNumber($number)
    {
        if (!is_int($number))
        {
            throw new \InvalidArgumentException('Number must be of type integer.');
        }

        if ($number < 1)
        {
            throw new \Exception('Number must be greater than 1.');
        }

        if ($number > 3999)
        {
            throw new \Exception('Number greater than 3999 is not supported (yet).');
        }
    }

    /**
     * @param $roman
     * @return int
     * @throws Exception
     */
    public function convertToNumber($roman)
    {
        $this->validateRoman($roman);

        $solution = 0;

        $chars = str_split($roman);

        $length = count($chars);

        for ($i = 0; $i < $length; $i++)
        {
            if (!isset($chars[$i + 1]))
            {
                $solution += static::$numbers[$chars[$i]];

                break;
            }

            if (static::$numbers[$chars[$i]] >= static::$numbers[$chars[$i + 1]])
            {
                $solution += static::$numbers[$chars[$i]];

                continue;
            }

            $solution += static::$numbers[$chars[$i + 1]] - static::$numbers[$chars[$i]];

            $i++;
        }

        return $solution;
    }

    /**
     * @param $roman
     * @throws Exception
     */
    private function validateRoman($roman)
    {
        if (!is_string($roman))
        {
            throw new \Exception('Roman numeral must be a string.');
        }
    }

}
