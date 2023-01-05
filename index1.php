<?php
    session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if(isset($_SESSION["useruid"]))
{
    ?>

    <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
    <li><a href="includes/logout.php">Logout</a></li>
    <?php
    ?>

<?php }
else{ ?>
    <li><a href="#">Sign up></a></li>
    <li><a href="includes/login.php">Login</a></li>
    <?php
}
?>

<h2>Nemáš účet ještě? Zaregistruj se!</h2>
<form action="includes/singup.php" method="post">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
    <input type="text" name="email" placeholder="E-mail">
    <br>
    <button type="submit" name="submit">založení účtu</button>

</form>
<h2>Přihlaš se</h2>
<form action="includes/login.php" method="post">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <br>
    <button type="submit" name="submit">Login</button>
</form>


<p>

</p>
</body>
</html>