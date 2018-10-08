# PHP版本二叉树遍历算法

[![Build Status](https://img.shields.io/travis/slince/tree-samples/master.svg?style=flat-square)](https://travis-ci.org/slince/tree-samples)
[![Coverage Status](https://img.shields.io/codecov/c/github/slince/tree-samples.svg?style=flat-square)](https://codecov.io/github/slince/tree-samples)
[![Latest Stable Version](https://img.shields.io/packagist/v/slince/tree-samples.svg?style=flat-square&label=stable)](https://packagist.org/packages/slince/tree-samples)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/slince/tree-samples.svg?style=flat-square)](https://scrutinizer-ci.com/g/slince/tree-samples/?branch=master)

包含深度优先算法与广度优先算法; 本示例采用的是非递归算法；借用 `SplStack` 和 `SplQueue` 
实现两种算法的遍历。在开始讲算法之前，我们先创建一个二叉树节点类 `Node`,[源码](./src/Node.php)：

```php
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
    
    //...
}
```

## 深度优先（DFS）

此算法我们使用的是 `Stack`，栈的特性是先入后出，借此我们有了如下思路：

1. 创建一个空的堆栈 `SplStack` 对象
2. 将需要遍历的二叉树节点对象压入栈

```php
$stack = new \SplStack();
$stack->push($node);
```
3. 循环堆栈对象；
4. 弹出栈内的第一个节点，此节点即完成遍历；
5. 将当前访问的节点的右子节点和左子节点先后压入堆栈.

```php
while (!$stack->isEmpty()) {
    $stack->top();
    $node = $stack->pop();
    $visitor($node); //此节点完成访问

    //压右子树
    if ($node->getRight()) {
        $stack->push($node->getRight());
    }
    if ($node->getLeft()) {
        $stack->push($node->getLeft());
    }
}
```
6. 循环下去，直到堆栈内节点完全弹出即可完成二叉树的遍历。

[完整代码](./src/Traversal/DFS.php)


## 广度优先（BFS）


此算法我们使用的是 `Queue`，队列的特性是先入先出，我们的思路如下：

1. 创建一个空的堆栈 `SplQueue` 对象
2. 将需要遍历的二叉树节点对象入队

```php
$queue = new \SplQueue();
$queue->enqueue($node);
```
3. 循环队列对象；
4. 弹出对首的节点，此节点完成访问；
5. 将当前访问的节点的左子节点和由子节点先后入队.

```php
while (!$stack->isEmpty()) {
    $node = $queue->dequeue();
    $visitor($node); //此节点完成访问
    //压左子树
    if ($node->getLeft()) {
       $queue->push($node->getLeft());
    }
    if ($node->getRight()) {
       $queue->push($node->getRight());
    }
}
```
6. 循环下去，直到队列内元素完全弹出。

[完整代码](./src/Traversal/BFS.php)

## Usage

### Installation：

```bash
$ composer require slince/tree-samples
```

### Basic Usage：

```php

$leftChild = new Slince\Tree\Node(2);
$rightChild = new Slince\Tree\Node(3);
$node = new Slince\Tree\Node(1, $leftChild, $rightChild);

$bfs = new Slince\Tree\Traversal\BFS();
$numbers = [];
$bfs->travel($node, function(Node $node) use(&$numbers){
    $numbers[] = $node->getValue();
});

echo implode(',', $numbers);  // 输出 1,2,3

$dfs = new Slince\Tree\Traversal\DFS();
$numbers = [];
$bfs->travel($node, function(Node $node) use(&$numbers){
    $numbers[] = $node->getValue();
});

```

## LICENSE

MIT 协议；

