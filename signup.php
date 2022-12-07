<?php
    include_once "header.php";
    include('config/app.php');
    include('codes/authentication.php');

?>

        <section class="main-container">
            <div class="main-wrapper content-center">
            <?php include('message.php') ?>
                <h2>Signup</h2>
                <form action="" method="POST" class="signup-form">
                    <input type="text" name="fname" placeholder="Firstname">
                    <input type="text" name="lname" placeholder="Lastname">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="pwd" placeholder="Password">
                    <input type="text" name="c_pwd" placeholder="Confirm_Password">
                    <button type="submit" name="submit">Sign up</button>
                </form>
            </div>
        </section>
        <?php
    include_once "footer.php";

?> 