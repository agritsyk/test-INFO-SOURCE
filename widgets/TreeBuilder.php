<?php

declare(strict_types = 1);

namespace app\widgets;

use yii\base\Widget;

class TreeBuilder extends Widget
{
    public $branches = [];

    public function run(): string
    {
        return $this->generateTree(0);
    }

    private function generateTree(int $parentId): string
    {
        $tree = '';
        if (isset($this->branches[$parentId])) {
            foreach ($this->branches[$parentId] as $branch) {
                $tree .= $this->render('branch.php', [
                    'branchId' => $branch->id,
                    'childBranch' => $this->generateTree($branch->id),
                ]);

            }
        }

        return $tree;
    }
}