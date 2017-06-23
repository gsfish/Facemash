<?php

class DB
{
    function conn() {
        $conn = new mysqli('localhost', 'username', 'password', 'beauty');
        $conn->query("SET NAMES utf8;"); 
        return $conn;
    }

    function query($sql) {
        $conn = $this->conn();
        $result = $conn->query($sql);
        return $result;
    }

    function fetch($sql) {
        $result = $this->query($sql);
        $fetch = $result->fetch_array();
        return $fetch;
    }
}
