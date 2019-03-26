<?php

declare(strict_types=1);

namespace app\services;

use app\models\Branch;

class NodeGenerator
{
    private $tree = [[1, 0],
        [2, 0],
        [3, 1],
        [4, 1],
        [5, 2],
        [6, 3],
        [7, 3],
        [8, 1],
    ];

    /**
     * @return Branch[]
     */
    public function generate(): array
    {
        $newTree = [];
        foreach ($this->tree as $branch) {
            $b = new Branch();
            $b->id = $branch[0];
            $b->parentId = $branch[1];
            $newTree[$branch[1]][] = $b;
        }

        return $newTree;
    }
}