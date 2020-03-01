<?php

namespace Tests\Feature;

use App\Leetcode\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReverseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReverse()
    {
        $this->assertEquals(321,Solution::reverse(123));
        $this->assertEquals(-321,Solution::reverse(-123));
        $this->assertEquals(21,Solution::reverse(120));
        $this->assertEquals(0,Solution::reverse(1534236469));
        
    }
}
