<?php
namespace _namespace_;

use Waiterphp\Admin\Api\Dashboard as DashboardApi;
use Waiterphp\Admin\Config\Dashboard as Dashboard;
use Waiterphp\Admin\Config\AdminTree as AdminTree;

class _controller_ extends \Controller\Base
{
    use DashboardApi;

    protected function dashboard()
    {
        $dashboard = new Dashboard();

        $adminTree = new AdminTree(model('_model_'));

        $dashboard->add($adminTree);
        return $dashboard;
    }
}