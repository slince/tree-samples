<?php

namespace Slince\Tree\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Slince\Tree\Node;

class TestCase extends BaseTestCase
{
    /**
     * @return Node
     */
    public function createNode()
    {
        $node4 = new Node(4);
        $node5 = new Node(5);
        $node2 = new Node(2, $node4, $node5);

        $node6 = new Node(6);
        $node7 = new Node(7);
        $node3 = new Node(3, $node6, $node7);

        $node1 = new Node(1, $node2, $node3);

        return $node1;
    }
}