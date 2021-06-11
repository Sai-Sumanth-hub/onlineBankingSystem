<?php
session_start();

if (isset($_SESSION['ACC']) and isset($_SESSION['USER'])) {

    $get = $_GET['AccessCode'];

    if ($get === "logout-phpfile-me") {
        session_unset();
        session_destroy();
        header("location:home-page.php");
    }
    elseif ($get === "ST-phpfile-request") {
        header("location:start-transaction.php");
    }
    elseif ($get === "VAC-phpfile-request") {
        header("location:viewcustomers.php");
    }
}
else {
    $errmsg = "You need to Login First";
    header("location:home-page.php?request=Denied&msg=".htmlspecialchars($errmsg));
}
?>