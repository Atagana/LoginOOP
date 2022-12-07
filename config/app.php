<?php
session_start();

define('SITE_URL', 'http://localhost/LoginOOP/');
include_once('config/DatabaseConnetion.php');

/**
 * instantiating the database clase
 */
$db = new DatabaseConnection();

/**
 * function validate input fields
 * to sql injection
 */
function validate($conn, $input)
{
    return mysqli_real_escape_string($conn, $input);
}

/**
 * function to redirect user whenever --
 *  they submit the form with either --
 * an error or a success message
 */
function redirect($msg,$page)
{
    $_SESSION['msg'] = "$msg";
    $gotopage = SITE_URL.$page;
    header("Location: $gotopage");
    exit(0);

}