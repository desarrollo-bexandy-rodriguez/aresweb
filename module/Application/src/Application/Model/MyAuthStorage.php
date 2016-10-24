<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 15/10/16
 * Time: 10:00 AM
 */

namespace Application\Model;


use Zend\Authentication\Storage;

class MyAuthStorage extends Storage\Session
{
    public function setRememberMe($rememberMe = 0, $time = 1209600)
    {
        if ($rememberMe == 1){
            $this->session->getManager()->rememberMe($time);
        }
    }

    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    }
}