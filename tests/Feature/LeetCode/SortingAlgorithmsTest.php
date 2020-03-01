<?php

namespace Tests\Feature;

use App\Leetcode\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SortingAlgorithmsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->assertEquals([1,2,3,4,5],Solution::bubbleSort([5,4,3,2,1]));
    }
}
