<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Leetcode\Solution;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class largestNumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function xtestlargestNumber_1_0()
    {
        $this->assertEquals(10,Solution::largestNumber([1,0]));
    }

    public function xtestlargestNumber_100_9()
    {
        $this->assertEquals(9100,Solution::largestNumber([100,9]));
    }

    public function xtestlargestNumber_100_9_90()
    {
        $this->assertEquals(909100,Solution::largestNumber([100,9,90]));
    }

    public function xtestlargestNumber_1234567890()
    {
        $this->assertEquals(9876543210,Solution::largestNumber([1,2,3,4,5,6,7,8,9,0]));
    }

    public function testmax_100_9()
    {
        $this->assertEquals(9,Solution::max(100,9));
    }

    public function testmax_90_9()
    {
        $this->assertEquals(90,Solution::max(90,9));
    }

    public function testmax_90_80()
    {
        $this->assertEquals(90,Solution::max(90,80));
    }

    public function testmax_9_9()
    {
        $this->assertEquals(9,Solution::max(9,9));
    }

    public function testmax_99_98()
    {
        $this->assertEquals(99,Solution::max(99,98));
    }


}
