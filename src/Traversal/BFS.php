<?php

/*
 * This file is part of the slince/tree-samples package.
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slince\Tree\Traversal;

use Slince\Tree\Node;

class BFS implements Traversal
{
    /**
     * {@inheritdoc}
     */
    public function traver(Node $node, $visitor)
    {
        $stack = new \SplQueue();
        $stack->push($node);

        while (!$stack->isEmpty()) {
            $stack->top();
            $node = $stack->pop();
            $visitor($node);

            //压左子树
            if ($node->getLeft()) {
                $stack->push($node->getLeft());
            }
            if ($node->getRight()) {
                $stack->push($node->getRight());
            }
        }
    }
}