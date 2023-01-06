<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="zpracovani.php" method="POST">
    <label for="author">Autor:</label><br>
    <input type="text" id="author" name="author"><br>
    <label for="text">Text komentáře:</label><br>
    <textarea id="text" name="text"></textarea><br>
    <input type="submit" value="Odeslat komentář">
</form>
<?php
  // Připojení k databázi
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "comments";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Získání všech komentářů z databáze
  $sql = "SELECT * FROM comments ORDER BY created_at DESC";
  $result = mysqli_query($conn, $sql);

  // Zobrazení komentářů
  if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "<p><strong>" . $row['author'] . "</strong> napsal/a:</p>";
echo "<p>" . $row['text1'] . "</p>";
echo "<p>Vytvořeno: " . $row['created_at'] . "</p>";
}
} else {
echo "Zatím žádné komentáře.";
}

// Zavření připojení k databázi
mysqli_close($conn);
?>

</body>
</html>