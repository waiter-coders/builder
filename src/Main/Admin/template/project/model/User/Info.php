<?php
namespace Model\User;

use \Waiterphp\Dao\DaoTrait as DaoTrait;

class Info
{
    use DaoTrait;

    protected function setDaoConfig()
    {
        $this->daoConfig->setTable('admin_user');
        $this->daoConfig->setPrimaryKey('id');
        $this->daoConfig->setField('name', 'string', '名称');
        $this->daoConfig->setField('c1', 'string', '部门1');
        $this->daoConfig->setField('c2', 'string', '部门2');
        $this->daoConfig->setField('c3', 'string', '部门3');
        $this->daoConfig->setField('mail', 'string', '邮箱');
    }
}