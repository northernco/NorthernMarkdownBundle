<?php

namespace Northern\MarkdownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('northern_markdown');

        $treeBuilder->getRootNode()
                    ->children()
                        ->booleanNode('allow_relative_links')
                            ->info('Allow relative links when sanitizing.')
                            ->defaultValue(true)
                        ->end()
                    ->end();

        return $treeBuilder;
    }
}
