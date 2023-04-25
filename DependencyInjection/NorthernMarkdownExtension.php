<?php

namespace Northern\MarkdownBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NorthernMarkdownExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $maintenanceSubscriberDefinition = $container->getDefinition('northern_markdown.markdown_parser');
        $maintenanceSubscriberDefinition->setArgument('$allowRelativeLinks', $config['allow_relative_links']);
    }
}
