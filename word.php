<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cms word</title>

    <style>
 body, h1, table {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
   
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }
        
     
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        
        
        a {
            color: #007bff;
            text-decoration: none;
        }
        
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #007bff;
            color: #fff;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        
        .add-word-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
        
        
        .edit-link {
            color: #333;
        }
    </style>
</head>
<body>


<?php
include 'dbconnect.php';

$sql = "SELECT id, format, word_gr, word_en FROM word";
$result = $conn->query($sql);
?>


<a href="addword.php">Add new word</a>

<h1>CMS Word</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Format</th>
        <th>Λέξη (GR)</th>
        <th>Λέξη (EN)</th>
        <th></th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".htmlspecialchars($row["id"])."</td><td>".htmlspecialchars($row["format"])."</td><td>".htmlspecialchars($row["word_gr"])."</td><td>".htmlspecialchars($row["word_en"])."</td><td><a href='editword.php?id=".$row["id"]."'>Edit</a></td></tr>";
        }
        
    } else {
        echo "";
    }
    $conn->close();
    ?>
</table>
    
</body>
</html>
    
    


