<?php

    class LoginCotroller
    {

        /**
         * constructor function which grants the user
         * access to user entity of the database 
         */
        public function __construct()
        {
            /**instantiating our database class */
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        /**login function */
        public function verify_user($email,$password)
        {
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
            $result = $this->conn->query($query);
            if ($result->num_rows == 1) {
                
                $data = $result->fetch_assoc();
                $this->userAuthentication($data);
                return true;
            }else {
                return false;
            }
        }

        /**private function which sets the 
         * SESSION for loggin the user */
        private function userAuthentication()
        {
            
        }
    }