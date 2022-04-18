<?php

namespace App\Helpers;

class CategoriesHelper
{
    public static function buildTree(array $elements, $parentId = 0): array
    {
        $data = [];

        foreach ($elements as $element) {
            if ($element['parent_id'] === $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $data[] = $element;
            }
        }

        return $data;
    }
}
