<?php

namespace PHPMVC\LIB ;
use PDO ;
use PDOException;

class Database
{
    private $dbhostname = DB_HOST_NAME ;
    private $dbname = DB_NAME ;
    private $dbusername = DB_USER_NAME ;
    private $dbpassword = DB_PASSWORD ;

    private $dbhandler ;
    private $error ;
    private $SQL_STATEMENT;

    public function __construct()
    {
        try {
            $this->dbhandler  = new PDO('mysql://hostname='.$this->dbhostname.';dbname='.$this->dbname, $this->dbusername ,
                $this->dbpassword , array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                    PDO::ATTR_PERSISTENT =>true,
                ));
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($sql)
    {
        $this->SQL_STATEMENT = $this->dbhandler->prepare($sql);
    }

    public function bindValues($param,$value,$type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT ;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->SQL_STATEMENT->bindValue($param,$value,$type);
    }

    public function execute()
    {
        return $this->SQL_STATEMENT->execute() == true;
    }

    public function fetchAll()
    {
        $this->execute();
        return $this->SQL_STATEMENT->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchSingle()
    {
        $this->execute();
        return $this->SQL_STATEMENT->fetch(PDO::FETCH_ASSOC);
    }

    public function rowcount()
    {
        $this->execute();
        return $this->SQL_STATEMENT->rowCount();
    }
}