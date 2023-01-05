<?php

if(isset($_POST["submit"])){

    //získávání dat
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    //něco s signupContrl

    include "../classes/dbh.php";
    include "../classes/login.php";
    include "../classes/login-contr.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    header("location: adminpanel.php");
}