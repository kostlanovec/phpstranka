<?php
// Připojení k databázi
$host = "localhost";
$username = "root";
$password = "";
$dbname = "comments";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Získání dat z formuláře
$author = $_POST['author'];
$text1 = $_POST['text'];

// Validace údajů
if (empty($author) || empty($text1)) {
    echo "Je nutné vyplnit všechny údaje!";
    exit;
}

// Vložení komentáře do databáze
$sql = "INSERT INTO comments (author, text1, created_at) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $author, $text1, date('Y-m-d H:i'));
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Zavření připojení k databázi
mysqli_close($conn);
?>
