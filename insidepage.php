<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


include 'dbconnect.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    echo $slug;
    // Αναζήτηση της σελίδας με βάση το slug
    $sql = "SELECT * FROM pages WHERE slug = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $slug);


    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        

        $title_en = $row['title_en'];
        $content_en = $row['content_en'];
        $title_el = $row['title_el'];
        $content_el = $row['content_el'];
        $image_path = $row['image_path'];

        // Εμφάνιση των πληροφοριών της σελίδας
        echo "<h1>$title_en</h1>";
        
        if (!empty($image_path)) {
            echo '<img src="' . $image_path . '" alt="Page Image">';
        }
        
        echo "<p>$content_en</p>";
        echo "<h1>$title_el</h1>";
        
        if (!empty($image_path)) {
            echo '<img src="' . $image_path . '" alt="Page Image">';
        }
        
        echo "<p>$content_el</p>";
    } else {
        echo "Η σελίδα δεν βρέθηκε.";
    }

    $conn->close();
} else {
    echo "Δεν προσδιορίστηκε κανένα slug.";
}
?>

</body>
</html>