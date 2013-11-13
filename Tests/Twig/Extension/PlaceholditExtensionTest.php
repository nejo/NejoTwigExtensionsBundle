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
     * @covers PlaceholditExtension::getName
     */
    public function testGetName()
    {
        $this->assertEquals(
            'nejo_placeholdit_extension',
            $this->_twigExtension->getName()
        );
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
         * @var \Twig_SimpleFilter $object
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

    /**
     * @covers PlaceholditExtension::getPlaceholditUrl
     */
    public function testPlaceholditFilter()
    {
        $twig = new \Twig_Environment(new \Twig_Loader_String());
        $twig->addExtension($this->_twigExtension);

        $this->assertEquals(
            'http://placehold.it/300',
            $twig->render("{{ '300' | placeholdit }}")
        );

        $this->assertEquals(
            'http://placehold.it/300png/000/fff&amp;text=jander+klander',
            $twig->render("{{ '300' | placeholdit('jander klander', '000', 'fff', 'png') }}")
        );
    }
}