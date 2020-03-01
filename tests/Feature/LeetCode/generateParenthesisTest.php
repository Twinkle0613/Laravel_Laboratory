<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Leetcode\Solution;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class generateParenthesisTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_generateParenthesis_num()
    {

        $num = 70;
        $str = (string)$num;
        dd($str[1] % 2);
        $this->assertEquals([
            "((()))",
            "(()())",
            "(())()",
            "()(())",
            "()()()"
          ],Solution::generateParenthesis(3));


          $ara = 
        [
          "(((())))",
          "((()()))",
          "((())())",
          "((()))()",
          "(()(()))",
          "(()()())",
          "(()())()",

          "(())(())",
          "(())()()",

          "()((()))",
          "()(()())",
          "()(())()",
          
          "()()(())",
          "()()()()",
        
        
          "((((()))))",
          "(((()())))",
          "(((())()))",
          "(((()))())",
          "(((())))()",
          "((()(())))",
          "((()()()))",
          "((()())())",
          "((()()))()",
          "((())(()))",
          "((())()())",
          "((())())()",
          "((()))(())",
          "((()))()()",

          "(()((())))",
          "(()(()()))",
          "(()(())())",
          "(()(()))()",
          "(()()(()))",
          "(()()()())",
          "(()()())()",
          "(()())(())",
          "(()())()()",
          "(())((()))",
          "(())(()())",
          "(())(())()",
          "(())()(())",
          "(())()()()",

          "()(((())))",
          "()((()()))",
          "()((())())",
          "()((()))()",
          "()(()(()))",
          "()(()()())",
          "()(()())()",
          "()(())(())",
          "()(())()()",
          "()()((()))",
          "()()(()())",
          "()()(())()",
          "()()()(())",
          "()()()()()"
        
        
        ];
    }

    public function xtest_generateAll(){
        
        
        $char = '******';
        $ans = [];
        Solution::backtrack($ans, "", 0, 0, 5);
        dd($ans);

    }
}
