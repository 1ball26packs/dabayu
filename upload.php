<?php
// Tentukan folder tujuan penyimpanan file
$target_dir = "uploads/";

// Buat folder jika belum ada
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Cek apakah form sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    // Simpan file yang diupload ke folder "uploads"
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " berhasil diupload.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
    }
}

// Tampilkan daftar file yang telah diupload
$files = scandir($target_dir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            font-size: 24px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f4f4f4;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 
