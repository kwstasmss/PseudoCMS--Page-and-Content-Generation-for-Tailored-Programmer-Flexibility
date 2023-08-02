<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add page</title>
<style>
    .tabcontent {
        display: none;
    }

    .tabcontent#EN {
        display: block;
    }
    

    .container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.cms-link {
  display: block;
  margin-bottom: 20px;
}

.tab {
  margin-bottom: 20px;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
}

.tab button {
  background-color: #f1f1f1;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 20px;
  font-size: 16px;
  transition: background-color 0.3s;
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
}

.tabcontent {
  display: none;
}

.active {
  display: block;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #5190d3;
}




</style>

</head>
<body>

<?php
include 'dbconnect.php';

// Προσθήκη της συνάρτησης generateSlug() εδώ
function generateSlug($string){
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
 }

if (isset($_POST['title_en']) && isset($_POST['content_en']) && isset($_POST['seo_title_en']) && isset($_POST['seo_description_en']) && isset($_POST['seo_keywords_en']) && isset($_POST['title_el']) && isset($_POST['content_el']) && isset($_POST['seo_title_el']) && isset($_POST['seo_description_el']) && isset($_POST['seo_keywords_el']) && isset($_FILES['image'])) {
    $title_en = $_POST['title_en'];
    $content_en = $_POST['content_en'];
    $seo_title_en = $_POST['seo_title_en'];
    $seo_description_en = $_POST['seo_description_en'];
    $seo_keywords_en = $_POST['seo_keywords_en'];
  
    $title_el = $_POST['title_el'];
    $content_el = $_POST['content_el'];
    $seo_title_el = $_POST['seo_title_el'];
    $seo_description_el = $_POST['seo_description_el'];
    $seo_keywords_el = $_POST['seo_keywords_el'];
  
    $slug = generateSlug($title_en);
    $slugURL = 'http://localhost/cms/' . $slug;
  
    $imagePath = '';
  
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
      $targetDirectory = 'img/';
      $targetFile = $targetDirectory . basename($_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
      $imagePath = $targetFile;
    } elseif (isset($_POST['image']) && !empty($_POST['image'])) {
      $imagePath = $_POST['image'];
    }
  
    // Εισαγωγή των δεδομένων στον πίνακα "pages"
    // Εισαγωγή των δεδομένων στον πίνακα "pages" με παράμετρους
$sql = "INSERT INTO pages (slug, title_en, content_en, title_el, content_el, image_path, seo_title_en, seo_description_en, seo_keywords_en, seo_title_el, seo_description_el, seo_keywords_el) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Προετοιμάστε τη δήλωση
$stmt = $conn->prepare($sql);

// Εκχωρήστε τις τιμές των παραμέτρων
$stmt->bind_param("ssssssssssss", $slugURL, $title_en, $content_en, $title_el, $content_el, $imagePath, $seo_title_en, $seo_description_en, $seo_keywords_en, $seo_title_el, $seo_description_el, $seo_keywords_el);

// Εκτέλεση της δήλωσης
if ($stmt->execute()) {
echo "Page added successfully!";
header('Location: pages.php');
} else {
echo "Error adding page: " . $stmt->error;
}

$stmt->close();

}
?>



<form action="" method="POST" enctype="multipart/form-data">
    <label for="image" id="image-label">Upload Image:</label>
    <input type="file" name="image" id="image">

    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'EN')">EN</button>
    <button class="tablinks" onclick="openCity(event, 'GR')">GR</button>
    </div>

    <div id="EN" class="tabcontent">

        <label for="title_en">Title (EN):</label>
        <input type="text" name="title_en" id="title_en" placeholder="Enter title (EN)">

        <label for="content_en">Content (EN):</label>
        <textarea name="content_en" id="content_en" placeholder="Enter content (EN)"></textarea>

        <label for="seo_title_en">SEO Title (EN):</label>
        <input type="text" name="seo_title_en" id="seo_title_en" placeholder="Enter SEO title (EN)">

        <label for="seo_description_en">SEO Description (EN):</label>
        <textarea name="seo_description_en" id="seo_description_en" placeholder="Enter SEO description (EN)"></textarea>

        <label for="seo_keywords_en">SEO Keywords (EN):</label>
        <textarea name="seo_keywords_en" id="seo_keywords_en" placeholder="Enter SEO keywords (EN)"></textarea>
    </div>

    <div id="GR" class="tabcontent">

        <label for="title_el">Title (GR):</label>
        <input type="text" name="title_el" id="title_el" placeholder="Enter title (GR)">

        <label for="content_el">Content (GR):</label>
        <textarea name="content_el" id="content_el" placeholder="Enter content (GR)"></textarea>

        <label for="seo_title_el">SEO Title (GR):</label>
        <input type="text" name="seo_title_el" id="seo_title_el" placeholder="Enter SEO title (GR)">

        <label for="seo_description_el">SEO Description (GR):</label>
        <textarea name="seo_description_el" id="seo_description_el" placeholder="Enter SEO description (GR)"></textarea>

        <label for="seo_keywords_el">SEO Keywords (GR):</label>
        <textarea name="seo_keywords_el" id="seo_keywords_el" placeholder="Enter SEO keywords (GR)"></textarea>
    </div>

    <input type="submit" value="Submit">
</form>

<script>
  const tabs = document.querySelectorAll('.tablinks');
  const tabContents = document.querySelectorAll('.tabcontent');

  tabs.forEach(tab => {
    tab.addEventListener('click', (e) => {
      e.preventDefault();
      const target = document.getElementById(tab.getAttribute('onclick').split("'")[1]);

      tabContents.forEach(content => {
        content.style.display = 'none';
      });

      target.style.display = 'block';
    });
  });
</script>
</body>
</html>
