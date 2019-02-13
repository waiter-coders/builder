<?php
namespace Controller;


class Dashboard extends \Controller\Base
{
    public function getMenus()
    {
        return array(
            array("domain"=>"vote", "title"=>"问卷调查", "children"=>array(
                array("domain"=>"myVote", "title"=>"我的问卷")
            )),
        );
    }
}
