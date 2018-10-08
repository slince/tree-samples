<?php

namespace Slince\Tree\Tests\Traversal;

use Slince\Tree\Node;
use Slince\Tree\Tests\TestCase;
use Slince\Tree\Traversal\DFS;

class DFSTest extends TestCase
{
    public function testTraver()
    {
        $node = $this->createNode();
        $dfs = new DFS();

        $numbers = [];
        $dfs->travel($node, function(Node $node) use(&$numbers){
            $numbers[] = $node->getValue();
        });

        $this->assertEquals([1,2,4,5,3,6,7], $numbers);
    }
}