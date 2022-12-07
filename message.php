<?php

if (isset($_SESSION['msg'])) {
    echo "<h5 class='bg-danger text-white text-center'>".$_SESSION['msg']."</h5>";
    unset($_SESSION['msg']);
}