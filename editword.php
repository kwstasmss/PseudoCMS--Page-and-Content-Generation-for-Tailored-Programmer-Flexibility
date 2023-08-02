<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit word</title>

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
    $id = $_POST["id"];
    $format = "<" . $_POST["format"] . ">";
    $word_gr = $_POST["word_gr"];
    $word_en = $_POST["word_en"];

    updateWord($conn, $id, $format, $word_gr, $word_en);

    header("Location: word.php");
    exit();
} else {
    // Fetch current values
    $id = $_GET["id"];
    $wordData = fetchWord($conn, $id);
    $format = $wordData["format"];
    $word_gr = $wordData["word_gr"];
    $word_en = $wordData["word_en"];

    $conn->close();
}
?>
    <form method="post" action="editword.php">
        <label for="format">Format:</label><br>
        <input type="text" id="format" name="format" value="<?php echo htmlentities($format); ?>"><br>
        <label for="word_gr">Λέξη (GR):</label><br>
        <input type="text" id="word_gr" name="word_gr" value="<?php echo $word_gr; ?>"><br>
        <label for="word_en">Λέξη (EN):</label><br>
        <input type="text" id="word_en" name="word_en" value="<?php echo $word_en; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Update">
    </form>
</body>
</html>
