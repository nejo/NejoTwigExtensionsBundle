# Installation

# Composer

Add the bundle to the require section of your `composer.json`

``` json
{
    "require": {
        "nejo/twig-extensions-bundle": "dev-master"
    }
}
```

Run the composer update command

``` bash
$ php composer.phar update nejo/twig-extensions-bundle
```

# Enable the Bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        //..
        new Nejo\TwigExtensionsBundle\NejoTwigExtensionsBundle(),
        //..
    );
}
```
