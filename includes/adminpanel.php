<html>
<?php

session_start();

if (isset($_SESSION["useruid"])){
    ?>
    <h1>Tohle je admin panel</h1>
    <p>Zatím tu nic extra není, ale neboj. Brzy se tu něco objeví.</p>
    <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
    <li><a href="logout.php">Logout</a></li>
<?php }
    else{
        header( 'Location: ../index1.php' );
    }
    ?>

<?php
if (isset($_POST['editedContents'])) {
    $editedContents = $_POST['editedContents'];
    $fileName = $_POST['fileName'];
    file_put_contents($fileName, $editedContents . '<h2>Upraveno</h2>');
}
?>

<form action="nevim.php" method="post">
    <label for="nazev_dokumentu">Název dokumentu:</label><br>
    <input type="text" id="nazev_dokumentu" name="nazev_dokumentu"><br>
    <label for="title">Nadpis:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="category">Kategorie:</label><br>
    <select id="category" name="category">
        <option value="psychologie">Psychologie</option>
        <option value="fitness">fitness</option>
        <option value="byznys">byznys</option>
    </select><br>
    <label for="author">Autor:</label><br>
    <input type="text" id="author" name="author"><br>
    <label for="description">Popis:</label><br>
    <input type="text" id="description" name="description"><br>
    <label for="keywords">Klíčová slova:</label><br>
    <input type="text" id="keywords" name="keywords">
    <label for="content">Text:</label><br>
    <textarea id="content" name="content"></textarea><br>
    <select id="tag-select" onchange="insertTag()">
        <option value="">--- Vyberte tag ---</option>
        <option value="h2">H2</option>
        <option value="h3">H3</option>
        <option value="h4">H4</option>
    </select>
    <label for="image">Obrázek:</label><br>
    <input type="file" name="image" id="image"><br>
    <input type="submit" name="submit" value="Odeslat">
</form>


<h2>tohle je nevim </h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file-selector" />
    <div id="status"></div>
    <input type="submit" value="Open and Edit" />
</form>
</html>

<script>function insertTag() {
// Získání dropdown menu pro výběr tagu
        var tagSelect = document.getElementById("tag-select");
// Získání vybraného tagu
        var tag = tagSelect.value;
// Pokud není tag vybrán, přeruší se funkce
        if (tag === "") return;
// Získání textarea elementu
        var textarea = document.getElementById("content");
// Získání pozice kurzoru v textarea
        var cursorPos = textarea.selectionStart;
// Získání textu před a po pozici kurzoru
        var textBefore = textarea.value.substring(0, cursorPos);
        var textAfter  = textarea.value.substring(cursorPos, textarea.value.length);
// Vložení tagu do textu
        textarea.value = textBefore + "<" + tag + "></" + tag + ">" + textAfter;
// Nastavení kurzoru dovnitř tagu
        textarea.selectionStart = cursorPos + 2;
        textarea.selectionEnd = cursorPos + 2;
    }
</script>



<script>
    window.addEventListener('load', function() {
        document.getElementById('file-selector').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var contents = e.target.result;
                var newWindow = window.open();
                newWindow.document.body.innerHTML = '<div contenteditable>' + contents + '</div>';
                var saveButton = document.createElement('button');
                saveButton.innerHTML = 'Save';
                saveButton.style.position = 'absolute';
                saveButton.style.bottom = 0;
                saveButton.style.left = 0;
                newWindow.document.body.appendChild(saveButton);
                saveButton.addEventListener('click', function() {
                    var editedContents = newWindow.document.querySelector('div').innerHTML;
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            document.getElementById('status').innerHTML = 'Changes saved';
                            newWindow.close();
                        }
                    };
                    xhr.send('editedContents=' + editedContents + '&fileName=' + file.name);
                });
            };
            reader.readAsText(file);
        });
    });
</script>
</body>
</html>
