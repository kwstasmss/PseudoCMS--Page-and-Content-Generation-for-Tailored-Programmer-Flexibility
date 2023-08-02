<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add word</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #5190d3;
        }
    </style>
</head>
<body>


<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $format = "<".$_POST["format"].">";
    $word_gr = $_POST["word_gr"];
    $word_en = $_POST["word_en"];

    addWord($conn, $format, $word_gr, $word_en);

    header('Location: word.php');
    exit();
}
?>
    <form method="post" action="addword.php">
        <label for="format">Format:</label><br>
        <input type="text" id="format" name="format"><br>
        <label for="word_gr">Λέξη (GR):</label><br>
        <input type="text" id="word_gr" name="word_gr"><br>
        <label for="word_en">Λέξη (EN):</label><br>
        <input type="text" id="word_en" name="word_en"><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
