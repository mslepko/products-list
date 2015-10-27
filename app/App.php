<?php namespace App;

use App\Model\MySQLWrapper;

class App
{
    protected static $dbCredentials = array();

    public function start($credentials)
    {
        self::$dbCredentials = $credentials;
    }

    public function getConnection()
    {
        $this->db = new MySQLWrapper(self::$dbCredentials);
    }
}