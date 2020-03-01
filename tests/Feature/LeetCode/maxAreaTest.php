<?php

namespace Tests\Feature;
use App\Leetcode\Solution;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class maxAreaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMaxArea_2()
    {
        $this->assertEquals(0,Solution::maxArea([2]));

    }

    public function testMaxArea_22()
    {
        $this->assertEquals(2,Solution::maxArea([2,2]));

    }

    public function testMaxArea_222()
    {
        $this->assertEquals(4,Solution::maxArea([2,2,2]));

    }

    public function testMaxArea_2222()
    {
        $this->assertEquals(6,Solution::maxArea([2,2,2,2]));

    }

    public function testMaxArea_12()
    {
        $this->assertEquals(1,Solution::maxArea([1,2]));
    }

    public function testMaxArea_122()
    {
        $this->assertEquals(2,Solution::maxArea([1,2,2]));
    }

    public function testMaxArea_1222()
    {
        $this->assertEquals(4,Solution::maxArea([1,2,2,2]));
    }

    public function testMaxArea_1220()
    {
        $this->assertEquals(2,Solution::maxArea([1,2,3,0]));
    }

    public function testMaxArea_()
    {
        $this->assertEquals(49,Solution::maxArea([1,8,6,2,5,4,8,3,7]));
    }

    public function testMaxArea_11()
    {
        $this->assertEquals(1,Solution::maxArea([1,1]));
    }

    public function testMaxArea_234518176()
    {
        $this->assertEquals(17,Solution::maxArea([2,3,4,5,18,17,6]));
    }




}
