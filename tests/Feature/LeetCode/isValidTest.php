<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Leetcode\Solution;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class isValidTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testisValid_parentheses()
    {
        $this->assertEquals(true,Solution::isValid('()'));
    }

    public function testisValid_parentheses_open()
    {
        $this->assertEquals(false,Solution::isValid('('));
    }

    public function testisValid_parentheses_open_2()
    {
        $this->assertEquals(false,Solution::isValid('(('));
    }
    public function testisValid_parentheses_open_3()
    {
        $this->assertEquals(false,Solution::isValid('((('));
    }

    public function testisValid_parentheses_open_3_close_1()
    {
        $this->assertEquals(false,Solution::isValid('((()'));
    }

    public function testisValid_parentheses_open_3_close_2()
    {
        $this->assertEquals(false,Solution::isValid('((())'));
    }

    public function testisValid_parentheses_open_3_close_3()
    {
        $this->assertEquals(true,Solution::isValid('((()))'));
    }

    public function testisValid_square_bracket()
    {
        $this->assertEquals(true,Solution::isValid('[]'));
    }

    public function testisValid_square_bracket_open()
    {
        $this->assertEquals(false,Solution::isValid('['));
    }

    public function testisValid_square_bracket_open_2()
    {
        $this->assertEquals(false,Solution::isValid('[['));
    }

    public function testisValid_square_bracket_open_3()
    {
        $this->assertEquals(false,Solution::isValid('[[['));
    }

    public function testisValid_square_bracket_open_3_close_1()
    {
        $this->assertEquals(false,Solution::isValid('[[[]'));
    }

    public function testisValid_square_bracket_open_3_close_2()
    {
        $this->assertEquals(false,Solution::isValid('[[[]]'));
    }

    public function testisValid_square_bracket_open_3_close_3()
    {
        $this->assertEquals(true,Solution::isValid('[[[]]]'));
    }

    public function testisValid_curly_brackets()
    {
        $this->assertEquals(true,Solution::isValid('{}'));
    }

    public function testisValid_curly_brackets_half()
    {
        $this->assertEquals(false,Solution::isValid('{'));
    }

    public function testisValid_curly_brackets_open_2()
    {
        $this->assertEquals(false,Solution::isValid('{{'));
    }

    public function testisValid_curly_brackets_close_3()
    {
        $this->assertEquals(false,Solution::isValid('{{{'));
    }

    public function testisValid_curly_brackets_close_3_end_1()
    {
        $this->assertEquals(false,Solution::isValid('{{{}'));
    }

    public function testisValid_curly_brackets_close_3_end_2()
    {
        $this->assertEquals(false,Solution::isValid('{{{}}'));
    }

    public function testisValid_curly_brackets_close_3_end_3()
    {
        $this->assertEquals(true,Solution::isValid('{{{}}}'));
    }

    public function testisValid_3_type_brackets()
    {
        $this->assertEquals(true,Solution::isValid('(){}[]'));
    }

    public function testisValid_3_type_brackets_end_close()
    {
        $this->assertEquals(true,Solution::isValid('({}[])'));
    }

    public function testisValid_3_type_brackets_end_close_1()
    {
        $this->assertEquals(true,Solution::isValid('([{}])'));
    }

    public function testisValid_3_type_brackets_end_close_2()
    {
        $this->assertEquals(false,Solution::isValid('(])'));
    }

    public function testisValid_empty()
    {
        $this->assertEquals(true,Solution::isValid(""));
    }

    public function testisValid_empty_close()
    {
        $this->assertEquals(false,Solution::isValid(")"));
    }

}
