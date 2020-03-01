<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Leetcode\Solution;
use App\Leetcode\ListNode;

class AddTwoNumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testaddTwoNumbers()
    {
        $l1 = new ListNode(2);
        $l1->next = new ListNode(4);
        $l1->next->next = new ListNode(3);

        $l2 = new ListNode(5);
        $l2->next = new ListNode(6);
        $l2->next->next = new ListNode(4);

        $result = Solution::addTwoNumbers($l1,$l2);

        $this->assertEquals(7,$result->val);
        $this->assertEquals(0,$result->next->val);
        $this->assertEquals(8,$result->next->next->val);
    }

    public function testaddTwoNumbersl1_243_l2_is_null()
    {
        $l1 = new ListNode(2);
        $l1->next = new ListNode(4);
        $l1->next->next = new ListNode(3);

        $result = Solution::addTwoNumbers($l1,null);

        $this->assertEquals(2,$result->val);
        $this->assertEquals(4,$result->next->val);
        $this->assertEquals(3,$result->next->next->val);
    }

    public function testaddTwoNumbers_842_add_465()
    {
        $l1 = new ListNode(2);
        $l1->next = new ListNode(4);
        $l1->next->next = new ListNode(8);

        $l2 = new ListNode(5);
        $l2->next = new ListNode(6);
        $l2->next->next = new ListNode(4);

        $result = Solution::addTwoNumbers($l1,$l2);

        $this->assertEquals(7,$result->val);
        $this->assertEquals(0,$result->next->val);
        $this->assertEquals(3,$result->next->next->val);
        $this->assertEquals(1,$result->next->next->next->val);
    }

    public function testaddTwoNumbers_942_add_965()
    {
        $l1 = new ListNode(2);
        $l1->next = new ListNode(4);
        $l1->next->next = new ListNode(9);

        $l2 = new ListNode(5);
        $l2->next = new ListNode(6);
        $l2->next->next = new ListNode(9);

        $result = Solution::addTwoNumbers($l1,$l2);

        $this->assertEquals(7,$result->val);
        $this->assertEquals(0,$result->next->val);
        $this->assertEquals(3,$result->next->next->val);
        $this->assertEquals(1,$result->next->next->next->val);
    }

    

    public function xtestaddTwoNumbers_100000000000001()
    {
        $l1 = Solution::convertValueToNode(1000000000000000000000000000001);
        $l2 = Solution::convertValueToNode(564);
        $result = Solution::addTwoNumbers($l1,$l2);
        dd($l1);
        $this->assertEquals(7,$result->val);
        $this->assertEquals(0,$result->next->val);
        $this->assertEquals(8,$result->next->next->val);
    }


    public function xtestgetNodeValue_342(){
        $l1 = new ListNode(2);
        $l1->next = new ListNode(4);
        $l1->next->next = new ListNode(3);

        $this->assertEquals(342,Solution::getNodeValue($l1));
    }

    public function xtestgetNodeValue_0(){
        $l1 = new ListNode(0);
        $this->assertEquals(0,Solution::getNodeValue($l1));
    }

    public function xtestgetNodeValue_21(){
        $l1 = new ListNode(1);
        $l1->next = new ListNode(2);
        $this->assertEquals(21,Solution::getNodeValue($l1));
    }

    public function xtestgetNodeValue_9(){
        $l1 = new ListNode(9);
        $this->assertEquals(9,Solution::getNodeValue($l1));
    }

    public function xtestconvertValueToNode(){
        $l1 = Solution::convertValueToNode(144);
        $this->assertEquals(4,$l1->val);
        $this->assertEquals(4,$l1->next->val);
        $this->assertEquals(1,$l1->next->next->val);
    }

    public function xtestconvertValueToNode_0(){
        $l1 = Solution::convertValueToNode(0);
        $this->assertEquals(0,$l1->val);
        // $this->assertEquals(4,$l1->next->val);
        // $this->assertEquals(4,$l1->next->next->val);
    }

    public function xtestconvertValueToNode_1999(){
        $l1 = Solution::convertValueToNode(1999);
        $this->assertEquals(9,$l1->val);
        $this->assertEquals(9,$l1->next->val);
        $this->assertEquals(9,$l1->next->next->val);
        $this->assertEquals(1,$l1->next->next->next->val);
    }


}
