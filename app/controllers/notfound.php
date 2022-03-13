<?php
namespace PHPMVC\CONTROLLERS ;

use PHPMVC\LIB\Abstractcontroller;

class Notfound extends Abstractcontroller {

    public function notfound()
    {

        $this->Route("home/index");
    }
}
