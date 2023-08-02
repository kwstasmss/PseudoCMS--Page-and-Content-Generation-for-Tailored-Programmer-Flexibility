<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
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

$pageId = $_GET['id'];
$pageData = null;

// Προσθήκη της συνάρτησης generateSlug() εδώ
function generateSlug($string){
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
}


// Fetch page data
$sql = "SELECT * FROM pages WHERE id = $pageId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pageData = $result->fetch_assoc();
} else {
    die("Page not found.");
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $imagePath = $pageData['image_path'];
  
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
      $targetDirectory = 'img/';
      $targetFile = $targetDirectory . basename($_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
      $imagePath = $targetFile;
    }

    $sql = "UPDATE pages SET title_en = ?, content_en = ?, seo_title_en = ?, seo_description_en = ?, seo_keywords_en = ?, title_el = ?, content_el = ?, seo_title_el = ?, seo_description_el = ?, seo_keywords_el = ?, image_path = ?, slug = ? WHERE id = ?";

    // Προετοιμάστε τη δήλωση
    $stmt = $conn->prepare($sql);
    
    // Εκχωρήστε τις τιμές των παραμέτρων
    $stmt->bind_param("ssssssssssssi", $title_en, $content_en, $seo_title_en, $seo_description_en, $seo_keywords_en, $title_el, $content_el, $seo_title_el, $seo_description_el, $seo_keywords_el, $imagePath, $slugURL, $pageId);
    
    // Εκτέλεση της δήλωσης
    if ($stmt->execute()) {
        echo "Page updated successfully!";
        header('Location: pages.php');
    } else {
        echo "Error updating page: " . $stmt->error;
    }
    
    $stmt->close();
    
}

?>



<form action="" method="POST" enctype="multipart/form-data">
    <label for="image">Upload Image:</label>
    <input type="file" name="image" id="image">
    <?php
    if ($pageData['image_path'] != "") {
        $imageName = basename($pageData['image_path']);
        echo "Επιφορτωμένη εικόνα: " . $imageName;
    }
    ?>


<div class="tab">
<button type="button" class="tablinks" onclick="openCity(event, 'EN')">EN</button>
<button type="button" class="tablinks" onclick="openCity(event, 'GR')">GR</button>
</div>

    <div id="EN" class="tabcontent">
    <!-- Φόρμα επεξεργασίας για την αγγλική έκδοση -->
    <label for="title_en">Title (EN):</label>
    <input type="text" name="title_en" id="title_en" placeholder="Enter title (EN)" value="<?php echo $pageData['title_en']; ?>">

    <label for="content_en">Content (EN):</label>
    <textarea name="content_en" id="content_en" placeholder="Enter content (EN)"><?php echo $pageData['content_en']; ?></textarea>

    <label for="seo_title_en">SEO Title (EN):</label>
    <input type="text" name="seo_title_en" id="seo_title_en" placeholder="Enter SEO title (EN)" value="<?php echo $pageData['seo_title_en']; ?>">

    <label for="seo_description_en">SEO Description (EN):</label>
    <textarea name="seo_description_en" id="seo_description_en" placeholder="Enter SEO description (EN)"><?php echo $pageData['seo_description_en']; ?></textarea>

    <label for="seo_keywords_en">SEO Keywords (EN):</label>
    <textarea name="seo_keywords_en" id="seo_keywords_en" placeholder="Enter SEO keywords (EN)"><?php echo $pageData['seo_keywords_en']; ?></textarea>
</div>

<div id="GR" class="tabcontent">
    <!-- Φόρμα επεξεργασίας για την ελληνική έκδοση -->
    <label for="title_el">Title (GR):</label>
    <input type="text" name="title_el" id="title_el" placeholder="Enter title (GR)" value="<?php echo $pageData['title_el']; ?>">

    <label for="content_el">Content (GR):</label>
    <textarea name="content_el" id="content_el" placeholder="Enter content (GR)"><?php echo $pageData['content_el']; ?></textarea>

    <label for="seo_title_el">SEO Title (GR):</label>
    <input type="text" name="seo_title_el" id="seo_title_el" placeholder="Enter SEO title (GR)" value="<?php echo $pageData['seo_title_el']; ?>">

    <label for="seo_description_el">SEO Description (GR):</label>
    <textarea name="seo_description_el" id="seo_description_el" placeholder="Enter SEO description (GR)"><?php echo $pageData['seo_description_el']; ?></textarea>

    <label for="seo_keywords_el">SEO Keywords (GR):</label>
    <textarea name="seo_keywords_el" id="seo_keywords_el" placeholder="Enter SEO keywords (GR)"><?php echo $pageData['seo_keywords_el']; ?></textarea>
</div>


    <input type="submit" value="Update">
</form>

<script>

    function openCity(evt, lang) {

        evt.preventDefault();
        var i, tabcontent, tablinks;

        // Απόκρυψη όλων των στοιχείων tabcontent
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Επαναφορά όλων των κουμπιών σε μη ενεργά
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Εμφάνιση του συγκεκριμένου tab και καθορισμός του κουμπιού ως ενεργό
        document.getElementById(lang).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
</body>
</html>
