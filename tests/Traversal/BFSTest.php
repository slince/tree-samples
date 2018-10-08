<?php

namespace Slince\Tree\Tests\Traversal;

use Slince\Tree\Node;
use Slince\Tree\Tests\TestCase;
use Slince\Tree\Traversal\BFS;

class BFSTest extends TestCase
{
    public function testTraver()
    {
        $node = $this->createNode();
        $dfs = new BFS();

        $numbers = [];
        $dfs->travel($node, function(Node $node) use(&$numbers){
            $numbers[] = $node->getValue();
        });

        $this->assertEquals([1,2,3,4,5,6,7], $numbers);
    }
}