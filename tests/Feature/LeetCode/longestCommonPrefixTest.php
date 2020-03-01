<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Leetcode\Solution;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class longestCommonPrefixTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->assertEquals('fl',Solution::longestCommonPrefix(["flower","flow","flight"]));
        $this->assertEquals('flo',Solution::longestCommonPrefix(["flower","flow","floght"]));
        $this->assertEquals('flower',Solution::longestCommonPrefix(["flower"]));
        $this->assertEquals('',Solution::longestCommonPrefix(["dog","racecar","car"]));
    }
}
