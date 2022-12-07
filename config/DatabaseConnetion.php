<?php

CLass DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli('localhost','root','','loginoop');

        if (!$conn) {
            die("Database connection failed!");
        }
        return $this->conn = $conn;
    }

    
}