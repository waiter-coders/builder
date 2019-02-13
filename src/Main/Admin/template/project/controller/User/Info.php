<?php
namespace Controller\User;

use Waiterphp\Admin\Api\Dashboard as DashboardApi;
use Waiterphp\Admin\Config\Dashboard as Dashboard;
use Waiterphp\Admin\Config\AdminList as AdminList;

class Info extends \Controller\Base
{
    use DashboardApi;

    protected function dashboard()
    {
        $dashboard = new Dashboard();

        $adminList = new AdminList(model('user.info'));
        $adminList->setSearch('name', 'like');
        $adminList->setSearch('c1', 'like');
        $adminList->setSearch('c2', 'like');
        $adminList->setSearch('c3', 'like');
    

        $dashboard->add($adminList);
        return $dashboard;        
    }
}