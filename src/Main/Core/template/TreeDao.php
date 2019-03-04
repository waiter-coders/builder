<?php
namespace _namespace_;

use Waiterphp\Core\Dao\TreeTrait;

class _Model_ extends \Model\Base
{
    use TreeTrait;

    protected function setTreeConfig()
    {
        $this->daoConfig->setTable('_table_');
        $this->initTreeFields('_nodeId_', '_label_', '_topicId_', '_parentId_', '_preNodeId_', '_nextNodeId_');
    }
}