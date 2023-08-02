<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages</title>

    <style>
        /* Reset default browser styles */
        body, h1, table {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        /* Container styles */
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }
        
        /* Heading styles */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        
        /* Link styles */
        a {
            color: #007bff;
            text-decoration: none;
        }
        
        /* Table styles */
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
        
        /* Add Page button styles */
        .add-page-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
        
        /* Edit link styles */
        .edit-link {
            color: #333;
        }
    </style>
</head>
<body>

<?php
include 'dbconnect.php';

$sql = "SELECT * FROM pages";
$result = $conn->query($sql);

echo "<a href='addpage.php'>Add Page</a>";
echo "<h1>CMS Pages</h1>";
echo "<table><tr><th>Title (EN)</th><th>Title (EL)</th><th>Content (EN)</th><th>Content (EL)</th><th></th></tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["title_en"]. "</td><td>" . $row["title_el"]. "</td><td>" . $row["content_en"]. "</td><td>" . $row["content_el"]. "</td><td><a href='editpage.php?id=".$row["id"]."'>Edit</a></td></tr>";
  }
} else {
  echo "";
}

echo "</table>";
$conn->close();
?>


</body>
</html>
