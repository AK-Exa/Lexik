<?php
namespace Lexik\Controller;

use RedBeanPHP\Facade as R;

class HomeController
{
    public function homepageAction()
    {
        $user = R::load(\Lexik\Model\UserRepository::TYPE, 1);

        return array('user' => $user);
    }
}