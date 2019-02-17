<?php
namespace _namespace_;

use \Waiterphp\Admin\FormTrait as FormTrait;
use \Waiterphp\Admin\Config\Form as FormConfig;

class _controller_ extends \Controller\Base
{
    use FormTrait;

    protected function setConfig()
    {
        $adminForm = new FormConfig(model('_model_'));

        return $adminForm;
    }
}