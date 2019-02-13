<?php
namespace _namespace_;

use Waiterphp\Core\TreeTrait;

class _Model_ extends \Model\Base
{
    use TreeTrait;

    protected function setTreeConfig()
    {
        $this->daoConfig->setTable('_table_');
        $this->initTreeFields('_nodeId_', '_name_');
    }
}