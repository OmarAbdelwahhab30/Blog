<?php


namespace PHPMVC\MODELS;

use PHPMVC\lib\AbstractModel;
use PHPMVC\LIB\Database;

class UsersModel extends AbstractModel
{
    private $db ;

    private $ColumnsName = array();

    protected static $TableName = "users";


}