<?php

namespace Nejo\TwigExtensionsBundle\Tests\Twig\Extension;

use Nejo\TwigExtensionsBundle\Twig\Extension\PlaceholditExtension;

class PlaceholditExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PlaceholditExtension
     */
    private $_twigExtension;

    /**
     *  {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->_twigExtension = new PlaceholditExtension();
    }

    /**
     * @covers PlaceholditExtension::getFilters
     */
    public function testGetFilters()
    {
        $result = $this->_twigExtension->getFilters();

        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('Twig_SimpleFilter', $result[0]);

        /**
         * @var \Twig_SimpleFilter
         */
        $object = $result[0];

        $this->assertEquals('placeholdit', $object->getName());

        /**
         * @var array
         */
        $callable = $object->getCallable();

        $this->assertInstanceOf(
            'Nejo\TwigExtensionsBundle\Twig\Extension\PlaceholditExtension',
            $callable[0]
        );
        $this->assertEquals('getPlaceholditUrl', $callable[1]);
    }
}