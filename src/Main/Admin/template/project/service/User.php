<?php
namespace Service;

class User
{
    public function isLogin()
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }

    public function loginByPassword($username, $password)
    {
        $login = \Tools\Ldap::login($username, $password);
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