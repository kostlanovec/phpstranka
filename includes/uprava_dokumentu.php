<?php
if(isset($_POST["submit"])){

//získávání dat
$soubor = $_POST["fileToUpload"];
include "$soubor";

} ?>