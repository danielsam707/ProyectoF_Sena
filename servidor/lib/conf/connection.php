<?php

class Connection
{

    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;
    private $link;


    public function __construct()
    {

        $this->setConnect();
        $this->connect();

    }

    private function setConnect()
    {
        require 'conf.php';

        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->port = $port;
    }

    private function connect()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        if ($this->link) {
            echo "Conectado a la DB";
        } else {
            die(mysqli_error($this->link));
        }
    }

    public function getConnect()
    {
        return $this->link;
    }

    public function close()
    {
        mysqli_close($this->link);
    }
}
