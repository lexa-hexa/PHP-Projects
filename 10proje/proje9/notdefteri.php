<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Not Defteri</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        margin-bottom: 20px;
    }

    input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .note {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Not Defteri</h2>
    
    <form method="post">
        <input type="text" name="title" placeholder="Başlık" required>
        <textarea name="content" placeholder="İçerik" rows="4" required></textarea>
        <button type="submit" name="submit">Not Ekle</button>
    </form>

    <div id="notes">
        <?php
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $content = $_POST["content"];

            $new_note = $title . "|" . $content . PHP_EOL;

            $file = fopen("notes.txt", "a");
            fwrite($file, $new_note);
            fclose($file);

            echo "<div class='note'><strong>$title</strong><br>$content</div>";
        }

        if (file_exists("notes.txt")) {
            $notes = file("notes.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($notes as $note) {
                list($title, $content) = explode("|", $note);
                echo "<div class='note'><strong>$title</strong><br>$content</div>";
            }
        } else {
            echo "Henüz hiç not eklenmemiş.";
        }
        ?>
    </div>
</div>

</body>
</html>
