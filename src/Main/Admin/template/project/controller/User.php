<?php

namespace Controller;

use \Tools\Request as Request;

class User extends Base
{
    public function isLogin(Request $request)
    {
        return service('user')->isLogin();
    }

    public function login(Request $request)
    {
        $username = $request->getString('username');
        $password = $request->getString('password');
        $login = service('user')->loginByPassword($username, $password);
        return $login;
    }

    public function loginOut(Request $request)
    {
        return service('user')->loginOut();
    }
}