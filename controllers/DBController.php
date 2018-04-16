<?php

namespace App;


class DBController {

    protected $connection;

    public function __construct($host, $user, $pass, $db_name) {
        $this->connection = mysqli_connect($host, $user, $pass, $db_name);

        if (mysqli_connect_error()) {
            throw new \Exception('Could not connect to DBController');
        }
    }


    public function query($sql) {
        if (!$this->connection) {
            throw new \Exception('No connection');
        }

        $result = $this->connection->query($sql);

        if (mysqli_error($this->connection)) {
            throw new \Exception(mysqli_error($this->connection));
        }

        if (is_bool($result)) {
            return $result;
        }

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }


    public function escape($str) {
        return mysqli_escape_string($this->connection, $str);
    }
}
