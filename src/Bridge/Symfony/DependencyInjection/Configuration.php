<?php

declare(strict_types=1);

namespace Jerome1337\Gandi\Bridge\Symfony\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
* @author Jérôme Pogeant <p-jerome@hotmail.fr>
*/
final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jerome1337_gandi');

        $rootNode
            ->children()
            ->scalarNode('server_url')
            ->end()
            ->scalarNode('api_key')
            ->end()
        ;

        return $treeBuilder;
    }
}
