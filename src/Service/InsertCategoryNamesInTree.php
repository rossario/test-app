<?php

namespace App\Service;

class InsertCategoryNamesInTree
{
    public static function handleTree(array &$array, array &$names)
    {
        // if no id, then its sequential array
        if (!isset($array['id'])) {
            foreach ($array as &$row) {
                self::handleTree($row, $names);
            }
            return;
        }

        // check if $names has this category
        if (null !== ($name = $names[$array['id']] ?? null)) {
            $array['name'] = $name;
        }

        // recurse into children
        if (!empty($array['children'])) {
            foreach ($array['children'] as &$child) {
                self::handleTree($child, $names);
            }
        }
    }
}