<?php
namespace _namespace_;

use Waiterphp\Admin\Api\Dashboard as DashboardApi;
use Waiterphp\Admin\Config\Dashboard as Dashboard;
use Waiterphp\Admin\Config\AdminForm as AdminForm;

class _controller_ extends \Controller\Base
{
    use DashboardApi;

    protected function dashboard()
    {
        $dashboard = new Dashboard();

        $adminForm = new AdminForm(model('_model_'));

        $dashboard->add($adminForm);
        return $dashboard;
    }
}