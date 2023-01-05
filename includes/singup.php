<?php

if(isset($_POST["submit"])){

    //získávání dat
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];



    //něco s signupContrl

    include "../classes/dbh.php";
    include "../classes/signup.php";
    include "../classes/signup-contr..php";


    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    $signup->signupUser();

    header("location: adminpanel.php");
}