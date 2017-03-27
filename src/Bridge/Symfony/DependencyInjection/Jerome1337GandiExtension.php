<?php

declare(strict_types=1);

namespace Jerome1337\Gandi\Bridge\Symfony\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Jerome1337GandiExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(
            $this->getConfiguration($configs, $container),
            $configs
        );

        $container->setParameter('jerome1337_gandi.server_url', $config['server_url']);
        $container->setParameter('jerome1337_gandi.api_key', $config['api_key']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('sdk.xml');
    }
}
