<?php
namespace _namespace_;

use Waiterphp\Core\Dao\DaoTrait;

class _Model_ extends \Model\Base
{
    use DaoTrait;
    protected function setDaoConfig()
    {
        // 数据源配置
        $this->daoConfig->setTable('_table_');
        $this->daoConfig->setPrimaryKey('_primaryKey_');
        /* foreach ($fields as $key=>$value) {*/
        $this->daoConfig->setField('_value_field_', '_value_type_', /*if (isset($value['length'])){*/'_value_length_', /* } */'_value_name_');
        /* } */
    }
}
