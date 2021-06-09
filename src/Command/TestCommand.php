<?php

namespace App\Command;

use App\Service\CategoryNamesExtractor;
use App\Service\InsertCategoryNamesInTree;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test-command';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $tree = json_decode(file_get_contents(__DIR__ . '/../../test-data/tree.json'), true);
        $list = json_decode(file_get_contents(__DIR__ . '/../../test-data/list.json'), true);

        $names = CategoryNamesExtractor::extract($list);
        InsertCategoryNamesInTree::handleTree($tree, $names);

        dump($tree);

        return Command::SUCCESS;
    }
}