<?php

namespace Router;

class Web extends Base
{
    private $loginMap = [
        'user/login'=>1,
        'user/isLogin'=>1,
    ];

    public function route()
    {
        // 用户路由请求
        $path = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '';
        if (!model('user.session')->isLogin() && !isset($this->loginMap[$path])) {
            throw new \Exception('not login');
        }

        // 路由设置
        $this->router->set([
            ['^(\w+)/(\w+)/(\w+)$', 'controller.$1.$2.$3'],
            ['^(\w+)/(\w+)$', 'controller.$1.$2'],
        ])->route($path, [$this->request]);
    }
}