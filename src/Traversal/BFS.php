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
        $queue = new \SplQueue();
        $queue->enqueue($node);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $visitor($node);

            //压左子树
            if ($node->getLeft()) {
                $queue->push($node->getLeft());
            }
            if ($node->getRight()) {
                $queue->push($node->getRight());
            }
        }
    }
}