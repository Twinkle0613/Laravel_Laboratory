<?php


namespace App\Leetcode;
use App\Leetcode\ListNode;

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public static function twoSum($nums, $target) {
        if(isset($nums) && is_array($nums) && (sizeof($nums) > 1) && isset($target)){
            for($i = 0; $i < sizeof($nums);$i++){
                if($i != sizeof($nums)){
                    for($j = $i + 1; $j < sizeof($nums);$j++){
                        if( ($nums[$j] + $nums[$i]) === $target)
                        return [$i,$j];
                    }
                }
            }
        }
        return null;
    }

    public static function addTwoNumbers($l1, $l2) {
        $dummyHead =  new ListNode(0);
        $p = $l1;
        $q = $l2;
        $carry = 0;
        $curr = $dummyHead;
        while(isset($p) || isset($q)){
            $x = isset($p)?$p->val:0;
            $y = isset($q)?$q->val:0;
            $sum = $carry + $x + $y;
            $carry = (int)floor($sum/10);
            $curr->next = new ListNode($sum % 10);
            $curr = $curr->next;
            if(isset($p)) $p = $p->next;
            if(isset($q)) $q = $q->next;
        }

        if($carry > 0){
            $curr->next = new ListNode($carry);
        }

        return $dummyHead->next;


    }

    public static function getNodeValue($list_node){
        if( isset($list_node->next) ){
            return self::getNodeValue($list_node->next).$list_node->val;
        }else{
            return $list_node->val;
        }
    }

    public static function convertValueToNode($value){
        $array  = array_reverse(array_map('intval', str_split($value)));
        $float = ((float)$value);
        dd(number_format($float, 0, '', ''));
        dd(number_format($float));
        dd($value);
        $node = new ListNode($array[0]);
        $temp = $node;
        unset($array[0]);
        foreach($array as $arr){
            $temp->next = new ListNode($arr);
            $temp = $temp->next;
        }
        return $node;
    }

    public static function reverse($x){
        if($x > pow(2, 31) || $x < (-1*pow(2, 31))){
            return 0;
        } 

        if($x<0){
            $x = $x * -1;
            $number = (int) implode('',array_reverse( array_map('intval', str_split($x))));
            $number = $number * -1;
        }else{
            $number = (int) implode('',array_reverse( array_map('intval', str_split($x))));
        }

        if($number > pow(2, 31) || $number < (-1*pow(2, 31))){
            return 0;
        } 
        return $number;
    }

    public static function isPalindrome($x) {
        $num = $x;
        $rev = 0;
        while($num>$rev){
            $rev = ($rev*10)+$num % 10;
            $num = (int)floor($num/10);
        }
        return ($num === $rev|| $num === (int)floor($rev/10) );

        // $num = $x;
        // $rev = 0;
        // while($num>0){
        //     $temp = $num % 10;
        //     $num = (int)floor($num/10);
        //     $rev = ($rev*10)+$temp;
        // }
        // return ($x === $rev)?true:false;

    }

    public static function longestCommonPrefix($strs) {
        $prefix = '';
        if(is_array($strs)){
            $first_str = $strs[0];
            for($i=1;$i<= strlen($first_str);$i++){
                $search = substr($first_str,0,$i);
                foreach($strs as $str){
                    if(substr_compare($search,$str,0,$i) != 0){
                        return $prefix;
                    }
                }
                $prefix=$search;
            }
        }
        return $prefix;
    }

    public static function _maxArea($height) {
        $area = 0;
        if(sizeof($height)>1){
            $index_end = sizeof($height)-1;
            $index_start = 0;

            while($height[$index_end] == 0){
                $index_end--;
            }

            while($height[$index_start] == 0){
                $index_start++;
            }

            $limit = (sizeof($height)>2)?$index_end-1:1;

            for($i=0;$i<($limit);$i++){
                $last_height = $height[$index_end];
                $h = $height[$i]>$last_height?$last_height:$height[$i];
                $w = $index_end - $i;
                if($area<$h*$w){
                    $area = $h*$w;
                }
            }

            $limit = (sizeof($height)>2)?$index_start+1:1;
            for($i=sizeof($height)-1;$i>($limit);$i--){
                $first_height = $height[$index_start];
                $h = $height[$i]>$first_height?$first_height:$height[$i];
                $w =$i - $index_start  ;
                dump( $first_height);
                dump( $height[$i]);
                if($area<$h*$w){
                    $area = $h*$w;
                }
            }


          
        }
        return $area;
    }


    public static function maxArea($height) {
        // $area = 0;
        // if(sizeof($height)>1){
        //     $limit = sizeof($height);
        //     for($i=0;$i<($limit);$i++){
        //         for($j=$i+1;$j<($limit);$j++){
        //             $area = max($area,min($height[$j],$height[$i])*($j - $i));
        //         }
        //     }
        // }
        // return $area;

        $maxarea = 0; $l = 0; $r = sizeof($height) - 1;
        while ($l < $r) {
            $maxarea = max($maxarea,min($height[$r],$height[$l])*($r - $l));
            if ($height[$l] < $height[$r])
                $l++;
            else
                $r--;
        }
        return $maxarea;


    }

    public static function generateListNode($values){

        $node = new ListNode(0);
        $temp = $node;
        foreach($values as $value){
            $temp->next = new ListNode($value);
            $temp = $temp->next;
        }
        return $node->next;
    }

    public static function getListNodeValue($node_list){
        $node_values = [];
        $temp = $node_list;
        while($temp != null){
            $node_values[] = $temp->val;
            $temp = $temp->next;
        }
        return $node_values;
    }

    public static function mergeTwoLists($l1, $l2) {
        $x = $l1;
        $y = $l2;
        $list_node = new ListNode(0);
        $temp = $list_node;

        // while(isset($x) || isset($y)){
        //     if(isset($x) && isset($y)){
        //         if($x->val<$y->val){
        //             $node = 'x';
        //         }else{
        //             $node = 'y';
        //         }
        //         $temp->next = new ListNode(${$node}->val);
        //         ${$node} = ${$node}->next;
        //         $temp = $temp->next;
        //     }else{
        //         if(isset($x)){
        //             $temp->next = $x;
        //             $x = null;
        //         }else{
        //             $temp->next = $y;
        //             $y = null;
        //         }
        //     }
        // }
        // return $list_node->next;

         while(isset($x) && isset($y)){
                if($x->val<$y->val){
                    $node = 'x';
                }else{
                    $node = 'y';
                }
                $temp->next = ${$node};
                ${$node} = ${$node}->next;
                $temp = $temp->next;
         }

        if(isset($x)){
            $temp->next = $x;
        }else{
            $temp->next = $y;
        }

        return $list_node->next;

    }

    public static function isValid($s) {
        $store = [];

        if(empty($s)){
            return true;
        }

        for($i=0; $i<strlen($s);$i++){
            switch($s[$i]){
                case '(':case ')':
                    if($s[$i] == '('){
                        $store[] = '(';
                    }else{
                        if(end($store) == '('){
                            array_pop($store);
                        } else {
                            return false;
                        }
                    }
                break;
                case '[':case ']':
                    if($s[$i] == '['){
                        $store[] = '[';
                    }else{
                        if(end($store) == '['){
                            array_pop($store);
                        }else {
                            return false;
                        }
                    }
                break;
                case '{':case '}':
                    if($s[$i] == '{'){
                        $store[] = '{';
                    }else{
                        if(end($store) == '{'){
                            array_pop($store);
                        } else {
                            return false;
                        }
                    }
                break;
            }
        }
        
        if(empty($store)){
            return true;
        }
        

        return false;
        
    }

    public static function _generateParenthesis($n) {
        
        $parenthesis = [];
        $pattern = str_repeat("1", $n) . str_repeat("0", $n);
        $parenthesis[] =  $pattern;
        dump($pattern);
        
        for($i = $n - 1;$i>0;$i--){
            $pattern = substr_replace($pattern,'1',$i+1,1);
            $pattern = substr_replace($pattern,'0',$i,1);
            dump($pattern);
            $parenthesis[] = $pattern;
            $pattern2 = $pattern;
            $z = $n - $i - 1;

            if($z){
                $pattern2 = substr_replace($pattern2,'1',$n+1,1);
                $pattern2 = substr_replace($pattern2,'0',$n-1,1);
                dump($pattern2);

                $pattern2 = substr_replace($pattern2,'1',$n+1,1);
                $pattern2 = substr_replace($pattern2,'0',$n-1,1);
                dump($pattern2);

            }
            dump($z);
            for($j=$n+$z;$j<($n*2)-2;$j++){
                $pattern2 = substr_replace($pattern2,')',$j,1);
                $pattern2 = substr_replace($pattern2,'(',$j+1,1);
                dump($pattern2);
                $parenthesis[] = $pattern2;
            }
        }
    }


    public static function generateParenthesis($n) {
        $ans = [];
         Solution::backtrack($ans, "", 0, 0, $n);
         return $ans;
    }


    public static function generateAll($char,$pos,&$result){


    }

    public static function backtrack(&$ans,$cur,$open,$close,$max){
        
        if (strlen($cur) == $max * 2) {
            $ans[] = $cur;
            return;
        }

        if ($open < $max){
            self::backtrack($ans, $cur."(", $open+1, $close, $max);
        }

        if ($close < $open){
            self::backtrack($ans, $cur.")", $open, $close+1, $max);
        }
    }

    public static function largestNumber($nums){


    }

    public static function max($num1,$num2){
        $str1 = (string)$num1;
        $str2 = (string)$num2;
        if($str1[0] == $str2[0]){
            if(strlen($str1) == strlen($str2)){
                return max($num1,$num2);
            }else if(strlen($str1) > strlen($str2)){
                return $num1;
            }else{
                return $num2;
            }
        }else if($str1[0] > $str2[0]){
            return $num1;
        }else{
            return $num2;
        }

    }

    public static function bubbleSort($arr){

        
    }
    



}


