<?php

include_once('controllers/RegisterController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $fname = validate($db->conn, $_POST['fname']);
    $lname = validate($db->conn, $_POST['lname']);
    $email = validate($db->conn, $_POST['email']);
    $uid = validate($db->conn, $_POST['uid']);
    $pwd = validate($db->conn, $_POST['pwd']);
    $c_pwd = validate($db->conn, $_POST['c_pwd']);

    $register = new RegistrationController();
    $pwd_confirm = $register->confirm_pwd($pwd, $c_pwd);
    if ($pwd_confirm) 
    {
        $result_user = $register->checkuser($email); 
        if ($result_user) {

            redirect("Email Already taken", "signup.php");
        }else{
            $input_result = $register->verify_input(
            $fname,
            $lname,
            $email,
            $uid,
            $pwd);

            if ($input_result) {
                $register_query = $register->registration(
                    $fname,
                    $lname,
                    $email,
                    $uid,
                    $pwd);
            if ($register_query) {
                redirect("Registration was successful", "index.php");
            }
            }else{

                redirect("Technical Issue", "signup.php");
            }
        }
    }
    else
    {
        redirect("Both password does not match", "signup.php");
    }

    /**
     * User login section
     */
    if (isset($_POST['login'])) {
        $email = validate($db->conn, $_POST['email']);
        $password = validate($db->conn, $_POST['password']);
    }
}