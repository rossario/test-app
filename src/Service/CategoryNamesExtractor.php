<?php

namespace App\Service;

class CategoryNamesExtractor
{
    public static function extract($namesList): array
    {
        $result = [];

        foreach ($namesList as $row) {
            if (null !== ($name = $row['translations']['pl_PL']['name'] ?? null)) {
                $result[$row['category_id']] = $name;
            }
        }

        return $result;
    }
}