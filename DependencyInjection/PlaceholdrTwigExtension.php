<?php

namespace Nejo\PlaceholdrTwigExtensionBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\HttpKernel\DependencyInjection\Extension,
    Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Widop twig extensions configuration.
 *
 *
 * @author Alejandro Cornejo <acornejovila@gmail.com>
 */
class PlaceholdrTwigExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}