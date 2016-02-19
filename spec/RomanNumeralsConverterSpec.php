<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsConverterSpec extends ObjectBehavior
{

    function it_calculates_the_roman_numeral_for_1()
    {
        $this->convertToRoman(1)->shouldReturn('I');
    }

    function it_calculates_the_roman_numeral_for_2()
    {
        $this->convertToRoman(2)->shouldReturn('II');
    }

    function it_calculates_the_roman_numeral_for_4()
    {
        $this->convertToRoman(4)->shouldReturn('IV');
    }

    function it_calculates_the_roman_numeral_for_5()
    {
        $this->convertToRoman(5)->shouldReturn('V');
    }

    function it_calculates_the_roman_numeral_for_6()
    {
        $this->convertToRoman(6)->shouldReturn('VI');
    }

    function it_calculates_the_roman_numeral_for_10()
    {
        $this->convertToRoman(10)->shouldReturn('X');
    }

    function it_calculates_the_roman_numeral_for_11()
    {
        $this->convertToRoman(11)->shouldReturn('XI');
    }

    function it_calculates_the_roman_numeral_for_20()
    {
        $this->convertToRoman(20)->shouldReturn('XX');
    }

    function it_calculates_the_roman_numeral_for_50()
    {
        $this->convertToRoman(50)->shouldReturn('L');
    }

    function it_calculates_the_roman_numeral_for_100()
    {
        $this->convertToRoman(100)->shouldReturn('C');
    }

    function it_calculates_the_roman_numeral_for_500()
    {
        $this->convertToRoman(500)->shouldReturn('D');
    }

    function it_calculates_the_roman_numeral_for_1000()
    {
        $this->convertToRoman(1000)->shouldReturn('M');
    }

    function it_calculates_the_roman_numeral_for_1999()
    {
        $this->convertToRoman(1999)->shouldReturn('MCMXCIX');
    }

    function it_throws_an_exception_for_the_roman_numerals_smaller_than_1()
    {
        $this->shouldThrow('Exception')->during('convertToRoman', array(0));
    }

    function it_throws_an_exception_for_the_roman_numerals_greater_than_3999()
    {
        $this->shouldThrow('Exception')->during('convertToRoman', array(4000));
    }

    function it_translates_the_numeral_I_into_a_number()
    {
        $this->convertToNumber('I')->shouldReturn(1);
    }

    function it_translates_the_numeral_II_into_a_number()
    {
        $this->convertToNumber('II')->shouldReturn(2);
    }

    function it_translates_the_numeral_III_into_a_number()
    {
        $this->convertToNumber('III')->shouldReturn(3);
    }

    function it_translates_the_numeral_IV_into_a_number()
    {
        $this->convertToNumber('IV')->shouldReturn(4);
    }

    function it_translates_the_numeral_V_into_a_number()
    {
        $this->convertToNumber('V')->shouldReturn(5);
    }

    function it_translates_the_numeral_VI_into_a_number()
    {
        $this->convertToNumber('VI')->shouldReturn(6);
    }

    function it_translates_the_numeral_IX_into_a_number()
    {
        $this->convertToNumber('IX')->shouldReturn(9);
    }

    function it_translates_the_numeral_X_into_a_number()
    {
        $this->convertToNumber('X')->shouldReturn(10);
    }

    function it_translates_the_numeral_XIX_into_a_number()
    {
        $this->convertToNumber('XIX')->shouldReturn(19);
    }

    function it_adds_two_roman_numerals()
    {
        $this->addRomanNumerals(['XI', 'IX'])->shouldReturn(20);
    }

    function it_adds_three_roman_numerals()
    {
        $this->addRomanNumerals(['IV', 'CD', 'XII'])->shouldReturn(416);
    }

}
