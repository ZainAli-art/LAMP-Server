<?php

class DbEcommerceConn {
    protected function connection() {
        $host = "localhost";
        $dbname = "ecommerce";
        $username = "root";
        $passwd = "";

        $dsn = "mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, $username, $passwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    }
}