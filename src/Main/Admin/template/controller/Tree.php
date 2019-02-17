<?php
namespace _namespace_;

use \Waiterphp\Admin\TreeTrait as TreeTrait;
use \Waiterphp\Admin\Config\Tree as TreeConfig;

class _controller_ extends \Controller\Base
{
    use TreeTrait;

    protected function setConfig()
    {
        $adminTree = new TreeConfig(model('_model_'));

        return $adminTree;
    }
}