<?php
namespace _namespace_;

use \Waiterphp\Admin\TableTrait as TableTrait;
use \Waiterphp\Admin\Config\Table as TableConfig;

class _controller_ extends \Controller\Base
{
    use TableTrait;

    protected function setConfig()
    {
        $adminTable = new TableConfig(model('_model_'));

        return $adminTable;
    }
}