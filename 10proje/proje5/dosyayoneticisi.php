<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosya Yükleme ve Silme Uygulaması</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f7f7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #6a0d6d;
        }

        #fileToUpload {
            margin-bottom: 10px;
        }

        #fileInfo {
            margin-bottom: 20px;
            color: #6a0d6d;
        }

        .uploaded-file {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #d7c1d4;
            border-radius: 5px;
            background-color: #f3e8fd;
        }

        .file-name {
            flex-grow: 1;
            color: #6a0d6d;
            margin-right: 10px;
        }

        .delete-btn {
            padding: 5px 10px;
            background-color: #800080;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #6a0d6d;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Dosya Yükleme ve Silme Formu</h1>

    <?php
    // Dosya yükleme işlemini gerçekleştir
    if(isset($_POST["submit"])) {
        $target_dir = "uploads/"; // Yükleme dizini
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Yüklenecek dosyanın tam yolu
        $uploadOk = 1; // Yükleme durumu kontrolü

        // Dosya türünü kontrol et
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($fileType != "txt" && $fileType != "pdf" && $fileType != "docx" && $fileType != "xlsx") {
            echo "Sadece .txt, .pdf, .docx ve .xlsx dosyaları yüklenebilir.";
            $uploadOk = 0;
        }

        // Dosyayı yükle
        if ($uploadOk == 0) {
            echo "Dosyanız yüklenemedi.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Dosya ". basename( $_FILES["fileToUpload"]["name"]). " başarıyla yüklendi.";
                echo "<br>Dosya boyutu: " . ($_FILES["fileToUpload"]["size"] / 1024) . " KB";
            } else {
                echo "Dosya yükleme hatası.";
            }
        }
    }

    // Dosya silme işlemini gerçekleştir
    if(isset($_GET["delete"])) {
        $filename = $_GET["delete"];
        $uploads_dir = "uploads/";
        $file_path = $uploads_dir . $filename;

        if(file_exists($file_path)) {
            unlink($file_path); // Dosyayı sil
            echo "Dosya başarıyla silindi.";
        } else {
            echo "Dosya bulunamadı.";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Dosya Yükle" name="submit">
    </form>

    <div id="fileInfo"></div>

    <div id="uploadedFiles">
        <?php
        $uploads_dir = "uploads/";
        $files = scandir($uploads_dir);
        foreach($files as $file) {
            if($file != "." && $file != "..") {
                echo "<div class='uploaded-file'>";
                echo "<span class='file-name'>$file</span>";
                echo "<button class='delete-btn' onclick='deleteFile(\"$file\")'>Sil</button>";
                echo "</div>";
            }
        }
        ?>
    </div>
</div>

<script>
    const fileInput = document.getElementById('fileToUpload');
    const fileInfo = document.getElementById('fileInfo');

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            const fileName = this.files[0].name;
            fileInfo.textContent = 'Yüklenen Dosya: ' + fileName;
        }
    });

    function deleteFile(filename) {
        if(confirm("Bu dosyayı silmek istediğinizden emin misiniz?")) {
            window.location.href = "?delete=" + filename;
        }
    }
</script>

</body>
</html>
