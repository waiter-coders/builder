<?php
namespace _namespace_;

use Waiterphp\Admin\Api\Dashboard as DashboardApi;
use Waiterphp\Admin\Config\Dashboard as Dashboard;
use Waiterphp\Admin\Config\AdminList as AdminList;

class _controller_ extends \Controller\Base
{
    use DashboardApi;

    protected function dashboard()
    {
        $dashboard = new Dashboard();

        $adminList = new AdminList(model('_model_'));

        $dashboard->add($adminList);
        return $dashboard;
    }
}