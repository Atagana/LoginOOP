<?php

class RegistrationController
{
    /**Constuctor function which automatically 
     * executes the database class 
     * when the program is executed */
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    /**
     * this function inserts our data into the 
     * user table of the database
     */
    public function registration($fname,$lname,$email,$uid,$pwd)
    {
        $register_query = "INSERT INTO users(fname,lname,email,uname,pwd) VALUES('$fname','$lname','$email','$uid','$pwd')";
        $result = $this->conn->query($register_query);
        return $result;
    }

    /**
     * function used in checking if there 
     * a user in the users table with the 
     * same email entered by the new user
     */
    public function checkuser($email)
    {
        $user_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = $this->conn->query($user_query);

        if ($result->num_rows == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * function to check if both password entered 
     * by the user matches each other
     */
    public function confirm_pwd($pwd,$c_pwd)
    {
        if ($pwd === $c_pwd) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * function to restrict user from submitting
     * empty or incomplete form
     */
    public function verify_input($fname,$lname,$email,$uid,$pwd)
    {
        if (!empty($fname || $lname || $email || $uid || $pwd)) {
            return true;
        }
        else {
            return false;
        }
    }
}