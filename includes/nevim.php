<?php

/*try {
    $username = "root";
    $password = "";
    $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
    return $dbh;
}

catch (PDOException $e){
    print "Error!: " .$e->getMessage()."<br/>";
    die();
}
*/
?>

<?php
// Zpracování formuláře při odeslání
if (isset($_POST['submit'])) {
    // Získání dat z formuláře
    $title = $_POST['title'];
    $nazev_dokumentu = $_POST['nazev_dokumentu'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];
    $content = $_POST['content'];
    $image = $_POST['image'];
    $time = time();

    // Vytvoření HTML souboru
    $html = "<!DOCTYPE html>\n";
    $html .= "<html>\n";
    $html .= "<head>\n";
    $html .= "<title>$title</title>\n";
    $html .= "<meta name='author' content='$author'>\n";
    $html .= "<meta name='description' content='$description'>\n";
    $html .= "<meta name='keywords' content='$keywords'>\n";
    $html .= "</head>\n";
    $html .= "<body>\n";
    $html .= "<header>\n";
    $html .= "<img src='$image' alt='Obrazek' />\n";
    $html .= "</header>\n";
    $html .= "<nav>\n";
    $html .= "</nav>\n";
    $html .= "<h1>$title</h1>\n";
    $html .= "<p>$content</p>\n";
    $html .= "<footer>\n";
    $html .= "</footer>\n";
    $html .= "</body>\n";
    $html .= "</html>\n";

    // Uložení souboru na serveru
    file_put_contents("$nazev_dokumentu.html", $html);

    // Uložení dat do databáze
    //$conn = mysqli_connect('localhost', 'username', 'password', 'database');
}
?>
