<?php
include 'dbconnect.php';

// Λειτουργία για να ανακτήσετε το κατάλληλο word
function getWord($conn, $format, $language) {
    // Ερώτημα SQL για ανάκτηση της λέξης με βάση το format
    $sql = "SELECT word_gr, word_en FROM word WHERE format = ?";

    // Εκτέλεση του ερωτήματος SQL
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $format); // Ορισμός των παραμέτρων του ερωτήματος
        $stmt->execute(); // Εκτέλεση του ερωτήματος
        $result = $stmt->get_result(); // Λήψη του αποτελέσματος του ερωτήματος

        // Έλεγχος αν υπάρχουν εγγραφές στο αποτέλεσμα
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Λήψη της επόμενης εγγραφής
            return ($language == "gr") ? $row["word_gr"] : $row["word_en"]; // Επιστροφή της κατάλληλης λέξης ανάλογα με τη γλώσσα
        }

        $stmt->close(); // Κλείσιμο του statement
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Εμφάνιση σφάλματος αντιμετωπίστηκε κάποιο πρόβλημα με το ερώτημα SQL
    }

    return null; // Επιστροφή null αν δεν βρέθηκε καμία λέξη
}


function addWord($conn, $format, $word_gr, $word_en) {
    // Ερώτημα SQL για προσθήκη μιας νέας λέξης
    $sql = "INSERT INTO word (format, word_gr, word_en) VALUES (?, ?, ?)";

    // Εκτέλεση του ερωτήματος SQL
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $format, $word_gr, $word_en); // Ορισμός των παραμέτρων του ερωτήματος
        $stmt->execute(); // Εκτέλεση του ερωτήματος
        $stmt->close(); // Κλείσιμο του statement
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Εμφάνιση σφάλματος αντιμετωπίστηκε κάποιο πρόβλημα με το ερώτημα SQL
    }
}



function updateWord($conn, $id, $format, $word_gr, $word_en) {
    // Ερώτημα SQL για ενημέρωση μιας υπάρχουσας λέξης
    $sql = "UPDATE word SET format = ?, word_gr = ?, word_en = ? WHERE id = ?";

    // Εκτέλεση του ερωτήματος SQL
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $format, $word_gr, $word_en, $id); // Ορισμός των παραμέτρων του ερωτήματος
        $stmt->execute(); // Εκτέλεση του ερωτήματος
        $stmt->close(); // Κλείσιμο του statement
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Εμφάνιση σφάλματος αντιμετωπίστηκε κάποιο πρόβλημα με το ερώτημα SQL
    }
}



function fetchWord($conn, $id) {
    // Ερώτημα SQL για ανάκτηση μιας λέξης με βάση το ID
    $sql = "SELECT format, word_gr, word_en FROM word WHERE id = ?";

    // Εκτέλεση του ερωτήματος SQL
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id); // Ορισμός των παραμέτρων του ερωτήματος
        $stmt->execute(); // Εκτέλεση του ερωτήματος
        $stmt->bind_result($format, $word_gr, $word_en); // Ανάκτηση των αποτελεσμάτων του ερωτήματος στις μεταβλητές

        $stmt->fetch(); // Λήψη των τιμών των πεδίων στις μεταβλητές

        $stmt->close(); // Κλείσιμο του statement
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Εμφάνιση σφάλματος αντιμετωπίστηκε κάποιο πρόβλημα με το ερώτημα SQL
    }

    // Αφαίρεση των < και > από το format πριν την εμφάνιση
    $format = str_replace(array('<', '>'), '', $format);

    // Επιστροφή των αποτελεσμάτων σε έναν πίνακα
    return array("format" => $format, "word_gr" => $word_gr, "word_en" => $word_en);
}

?>
