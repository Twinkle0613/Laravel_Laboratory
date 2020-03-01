<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Leetcode\Solution;

class SumTwoTest extends TestCase
{
    /**
     * A basic feature test example.
     *Given nums = [2, 7, 11, 15], target = 9,
    * Because nums[0] + nums[1] = 2 + 7 = 9,
    * return [0, 1].
     * @return void
     */
    public function testPassNulltoNumsParameter()
    {
        $result = Solution::twoSum(null,9);
        $this->assertNull($result);
    }

    public function testPassNulltoTargetParameter()
    {
        $result = Solution::twoSum([12],null);
        $this->assertNull($result);
    }

    public function testPassNulltoNumsAndTargetParameter()
    {
        $result = Solution::twoSum(null,null);
        $this->assertNull($result);
    }

    public function testPassOneArraytoNumParameter()
    {
        $result = Solution::twoSum([12],9);
        $this->assertNull($result);
    }

    public function testPassNoArrayValuetoNumParameter()
    {
        $result = Solution::twoSum(12,9);
        $this->assertNull($result);
    }

    public function xtestPassCharArrayValuetoNumParameter()
    {
        $result = Solution::twoSum(['qwe','123'],9);
        $this->assertNull($result);
    }

    public function testExpectedOneAndZeroIndex()
    {
        $num = [2, 7, 11, 15];
        $target = 9;
        $value = Solution::twoSum($num,$target);
        $expected = [0,1];
        $this->assertEquals($expected,$value);
    }

    public function testExpectedOneAndTwoIndex()
    {
        $num = [2, 7, 11, 15];
        $target = 18;
        $value = Solution::twoSum($num,$target);
        $expected = [1,2];
        $this->assertEquals($expected,$value);
    }

    public function testExpectedTwoAndThreeIndex()
    {
        $num = [2, 7, 11, 15];
        $target = 26;
        $value = Solution::twoSum($num,$target);
        $expected = [2,3];
        $this->assertEquals($expected,$value);
    }

    public function testExpectedZeroAndThreeIndex()
    {
        $num = [2, 7, 11, 15];
        $target = 17;
        $value = Solution::twoSum($num,$target);
        $expected = [0,3];
        $this->assertEquals($expected,$value);
    }

    public function testExpectedOneAndThreeIndex()
    {
        $num = [2, 7, 11, 15];
        $target = 22;
        $value = Solution::twoSum($num,$target);
        $expected = [1,3];
        $this->assertEquals($expected,$value);
    }

    public function testCannotFindTarget()
    {
        $num = [2, 7, 11, 15];
        $target = 100;
        $value = Solution::twoSum($num,$target);
        $expected = [1,3];
        $this->assertEquals(null,$value);
    }

    public function testTargetIsZero()
    {
        $num = [0, 7, 11, 0];
        $target = 0;
        $value = Solution::twoSum($num,$target);
        $expected = [0,3];
        $this->assertEquals($expected,$value);
    }

    public function testRepeatNumberInNums()
    {
        $num = [0, 7, 0, 0];
        $target = 0;
        $value = Solution::twoSum($num,$target);
        $expected = [0,2];
        $this->assertEquals($expected,$value);
    }



}
