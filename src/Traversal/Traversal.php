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

interface Traversal
{
    /**
     * 遍历树
     *
     * @param Node $node
     * @param callable $visitor
     * @return array
     */
    public function travel(Node $node, $visitor);
}