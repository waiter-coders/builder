<?php

namespace Router;

class Web extends Base
{
    private $loginMap = array(
        'user/login'=>1,
        'user/isLogin'=>1,
    );

    public function route()
    {
        // 用户路由请求
        $path = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '';
        if (!service('user')->isLogin() && !isset($this->loginMap[$path])) {
            throw new \Exception('not login');
        }

        // 路由设置
        $this->router->set(array(
            array('^(\w+)/(\w+)/(\w+)$', 'controller.$1.$2.$3'),
            array('^(\w+)/(\w+)$', 'controller.$1.$2'),           
        ));

        // 路由启动
        return $this->router->route($path, array($this->request));
    }
}