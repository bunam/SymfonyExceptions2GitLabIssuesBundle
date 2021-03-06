<?php

namespace Chteuchteu\SymExc2GtlbIsuBndle\DependencyInjection;

use Chteuchteu\SymExc2GtlbIsuBndle\SymfonyExceptions2GitLabIssuesBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root(SymfonyExceptions2GitLabIssuesBundle::DI_Alias);

        $rootNode
            ->children()
                ->scalarNode('gitlab_api_url')
                    ->defaultValue('https://gitlab.com/api/v3/')
                ->end()
                ->scalarNode('gitlab_token')
                    ->isRequired()
                    ->defaultNull()
                ->end()
                ->scalarNode('project')
                    ->isRequired()
                    ->defaultNull()
                ->end()
                ->booleanNode('reopen_closed_issues')
                    ->defaultValue(true)
                ->end()
                ->arrayNode('excluded_environments')
                    ->prototype('scalar')->end()
                    ->defaultValue(['dev', 'test'])
                ->end()
                ->arrayNode('excluded_exceptions')
                    ->prototype('scalar')->end()
                    ->defaultValue([])
                ->end()
                ->arrayNode('mentions')
                    ->prototype('scalar')->end()
                    ->defaultValue([])
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
