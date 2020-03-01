<?php

namespace Tests\Feature;
use App\Leetcode\Solution;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IsPalindromeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testisPalindrome_input_121_expect_true()
    {
        // $this->assertEquals(false,Solution::isPalindrome(-121));

        // $this->assertEquals(false,Solution::isPalindrome(12345));
        // $this->assertEquals(false,Solution::isPalindrome(1245));
        // $this->assertEquals(false,Solution::isPalindrome(1223));
        // $this->assertEquals(false,Solution::isPalindrome(1222));
        // $this->assertEquals(true,Solution::isPalindrome(1221));
        $this->assertEquals(false,Solution::isPalindrome(10));
        $this->assertEquals(true,Solution::isPalindrome(1));
        // $this->assertEquals(true,Solution::isPalindrome(12321));
        // $this->assertEquals(true,Solution::isPalindrome(121));

    }
}
