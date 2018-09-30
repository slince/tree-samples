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

class DFS implements Traversal
{
    /**
     * {@inheritdoc}
     */
    public function traver(Node $node, $visitor)
    {
        $stack = new \SplStack();
        $stack->push($node);

        while (!$stack->isEmpty()) {
            $stack->top();
            $node = $stack->pop();
            $visitor($node);

            //压右子树
            if ($node->getRight()) {
                $stack->push($node->getRight());
            }
            if ($node->getLeft()) {
                $stack->push($node->getLeft());
            }
        }
    }
}