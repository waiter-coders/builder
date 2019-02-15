<?php
namespace Controller;


class Dashboard extends \Controller\Base
{
    public function getMenus()
    {
        return load_configs(__DIR__ . '/../config/menu.php', false);
    }
}
