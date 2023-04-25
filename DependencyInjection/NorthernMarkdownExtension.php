<?php

namespace Northern\MarkdownBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class NorthernMarkdownExtension extends ConfigurableExtension
{
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $markdownParserDefinition = $container->getDefinition('northern_markdown.markdown_parser');
        $markdownParserDefinition->setArgument('$allowRelativeLinks', $mergedConfig['allow_relative_links']);
    }
}
