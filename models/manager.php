<?php

class Manager
{
    protected function dbConnect() {
        $db = new PDO('mysql:host=bd5000024306.hosting-data.io;dbname=dbs19544;charset=utf8', 'dbu29033', 'JSBpjbscrmpbtd159!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}