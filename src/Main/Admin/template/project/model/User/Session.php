<?php
namespace Model\User;

class Session
{
    public function isLogin()
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }

    public function loginByPassword($username, $password)
    {
        $login = false;

        // 管理员登录
        $admin = get_env('admin');
        if (isset($admin[$username]) && $admin[$username]['password'] == $password) {
            $login = true;
        }
        
        if ($login == true) {
            $_SESSION['username'] = trim($username);
        }
        return $login;
    }

    public function userId()
    {
        return $this->isLogin() ? $_SESSION['username'] : null;
    }

    public function loginOut()
    {
        session_destroy();
    }
}