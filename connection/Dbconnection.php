<?php

class Dbconnection
{
    //database name,server name,password,host name
    public $hostname;
    public $databasename;
    public $username;
    public $password;
    public $connection;

    function set_databasename($databasename)
    {
        $this->databasename = $databasename;
    }

    function set_username($username)
    {
        $this->username = $username;
    }

    function set_password($password)
    {
        $this->password = $password;
    }

    function set_hostname($hostname)
    {
        $this->hostname = $hostname;
    }

    function get_connection()
    {
        if (empty($this->hostname) || empty($this->databasename) || empty($this->username)) {
            echo 'Connetion requirements not met';
        } else {
            try {
                $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);
            } catch (Exception $e) {
                echo $e;
            }
        }

        return $this->connection;
    }
}
