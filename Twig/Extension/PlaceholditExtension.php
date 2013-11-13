<?php

/**
 * @author Alejandro Cornejo <acornejovila@gmail.com>
 */

namespace Nejo\TwigExtensionsBundle\Twig\Extension;

/**
 * Twig extension for calling the service Placehold.it
 *
 * @link http://placehold.it/
 */
class PlaceholditExtension extends \Twig_Extension
{

    const BASE_URL = 'http://placehold.it';

    /**
     * @var array
     */
    private $_formatsAccepted = array('jpg', 'jpeg', 'gif', 'png');

    /**
     * @var string
     */
    private $_baseUrl = '';

    /**
     * @var string
     */
    private $_size = '';

    /**
     * @var string
     */
    private $_backgroundColor = '';

    /**
     * @var string
     */
    private $_foregroundColor = '';

    /**
     * @var string
     */
    private $_text = '';

    /**
     * @var string
     */
    private $_format = '';

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'placeholdit',
                array(
                    $this,
                    'getPlaceholditUrl'
                )
            ),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nejo_placeholdit_extension';
    }

    /**
     * @param string $size
     * @param string $text
     * @param string $backgroundColor
     * @param string $foregroundColor
     * @param string $format
     *
     * @return string
     */
    public function getPlaceholditUrl(
        $size,
        $text='',
        $backgroundColor='',
        $foregroundColor = '',
        $format=''
    )
    {
        $this->_setBaseUrl(static::BASE_URL);
        $this->_setSize($size);
        $this->_setText($text);
        $this->_setBackgroundColor($backgroundColor);
        $this->_setForegroundColor($foregroundColor);
        $this->_setFormat($format);

        return $this->_getPlaceholditUrl();
    }

    /**
     * @return string
     */
    private function _getPlaceholditUrl()
    {
        $url = $this->_getBaseUrl();
        $url .= $this->_getSize();
        $url .= $this->_getFormat();
        $url .= $this->_getBackgroundColor();
        $url .= $this->_getForegroundColor();
        $url .= $this->_getText();

        return $url;
    }

    /**
     * @param string $url
     */
    private function _setBaseUrl($url)
    {
        $this->_baseUrl = $url;
    }

    /**
     * @return string
     */
    private function _getBaseUrl()
    {
        return $this->_baseUrl;
    }

    /**
     * @param string $size
     */
    private function _setSize($size)
    {
        $this->_size = $size;
    }

    /**
     * @return string
     */
    private function _getSize()
    {
        return '/' . $this->_size;
    }

    /**
     * @param string $text
     */
    private function _setText($text)
    {
        if (!empty($text)) {
            $this->_text = $text;
        }
    }

    /**
     * @return string
     */
    private function _getText()
    {
        $text = '';

        if (!empty($this->_text)) {
            $text = '&text=' . urlencode($this->_text);
        }

        return $text;
    }

    /**
     * @param string $color
     */
    private function _setBackgroundColor($color)
    {
        $this->_backgroundColor = $color;
    }

    /**
     * @return string
     */
    private function _getBackgroundColor()
    {
        $bgColor = '';

        if (!empty($this->_backgroundColor)) {
            $bgColor = '/' . $this->_backgroundColor;
        }

        return $bgColor;
    }

    /**
     * @param string $color
     */
    private function _setForegroundColor($color)
    {
        $this->_foregroundColor = $color;
    }

    /**
     * @return string
     */
    private function _getForegroundColor()
    {
        $fgColor = $this->_foregroundColor;
        $bgColor = $this->_getBackgroundColor();

        if (!empty($fgColor) && !empty($bgColor)) {
            $fgColor = '/' . $fgColor;
        }

        return $fgColor;
    }

    /**
     * @param string $format
     */
    private function _setFormat($format)
    {
        if (!empty($format) && in_array($format, $this->_formatsAccepted)) {
            $this->_format = $format;
        }
    }

    /**
     * @return string
     */
    private function _getFormat()
    {
        $format = '';

        if (!empty($this->_format)) {
            $format = $this->_format;
        }

        return $format;
    }
}