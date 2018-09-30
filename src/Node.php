<?php

/*
 * This file is part of the slince/tree-samples package.
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slince\Tree;

class Node
{
    /**
     * @var int
     */
    protected $value;

    /**
     * @var Node
     */
    protected $left;

    /**
     * @var Node
     */
    protected $right;

    public function __construct($value, $left = null, $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Node
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @return Node
     */
    public function getRight()
    {
        return $this->right;
    }
}