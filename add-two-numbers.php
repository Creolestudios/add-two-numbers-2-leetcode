/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $arr1 = [];
        $arr2 = [];

        while ( $l1 ) {
            $arr1[] = $l1->val;
            $l1     = $l1->next;
        }

        while ( $l2 ) {
            $arr2[] = $l2->val;
            $l2     = $l2->next;
        }

        $arr1 = array_reverse( $arr1 );
        $arr2 = array_reverse( $arr2 );

        $len1   = count( $arr1 );
        $len2   = count( $arr2 );
        $maxLen = max( $len1, $len2 );

        $result = [];
        $carry  = 0;

        for ( $i = 0; $i < $maxLen; $i++ ) {
            $sum      = ( $i < $len1 ? $arr1[ $i ] : 0 ) + ( $i < $len2 ? $arr2[ $i ] : 0 ) + $carry;
            $result[] = $sum % 10;
            $carry    = (int) ( $sum / 10 );
        }

        // If there's still a carry after the loop.
        if ( $carry > 0 ) {
            $result[] = $carry;
        }

        // Create a linked list from the result array.
        $result    = array_reverse( $result );
        $dummyHead = new ListNode();
        $current   = $dummyHead;
        foreach ( $result as $val ) {
            $current->next = new ListNode( $val );
            $current       = $current->next;
        }

        return $dummyHead->next;
    }
}