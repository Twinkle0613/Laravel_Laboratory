<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Leetcode\Solution;

class mergeTwoListsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     * Input: 1->2->4, 1->3->4
     * Output: 1->1->2->3->4->4
     */



    public function testGenerateListNode()
    {
        $node1 = Solution::generateListNode([1,2,4]);
        $node2 = Solution::generateListNode([1,3,4]);
        $expected = Solution::mergeTwoLists($node1,$node2);
        $this->assertEquals([1,1,2,3,4,4],Solution::getListNodeValue($expected));
    }


    public function testGenerateListNode_1_0()
    {
        $node1 = Solution::generateListNode([1]);
        $node2 = Solution::generateListNode([0]);
        $result = Solution::mergeTwoLists($node1,$node2);
        $this->assertEquals([0,1],Solution::getListNodeValue($result));
    }

    public function testGenerateListNode_123_134()
    {
        $node1 = Solution::generateListNode([1,2,3]);
        $node2 = Solution::generateListNode([1,3,4]);
        $expected = Solution::mergeTwoLists($node1,$node2);
        $this->assertEquals([1,1,2,3,3,4],Solution::getListNodeValue($expected));
    }

}
