

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View words</title>

        <style>
        /* Προσαρμογή του φόντου της σελίδας */
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        /* Στυλ για το κουμπί επιλογής γλώσσας */
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        select {
            padding: 12px;
            font-size: 16px;
            border: 2px solid #3498db;
            border-radius: 8px;
            outline: none;
            background-color: #f9f9f9;
            color: #333;
            transition: border-color 0.3s ease;
        }

        select:hover {
            border-color: #2980b9;
        }

        /* Προσαρμογή της εμφάνισης των <p> στοιχείων */
        p {
            font-size: 20px;
            margin: 10px 0;
            line-height: 1.6;
            color: #444;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Προσθήκη μικρής αναστολής στην αντίδραση των <p> κατά το πέρασμα του ποντικιού */
        p:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    </head>
    <body>
    <?php
session_start();

include 'functions.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["language"] = $_POST["language"];
    header('Location: viewword.php');
    exit();
}

$language = isset($_SESSION["language"]) ? $_SESSION["language"] : "gr";
?>
    <form method="post" action="viewword.php">
        <select id="language" name="language" onchange="this.form.submit()">
            <option value="gr" <?php if ($language == "gr") echo "selected"; ?>>Ελ</option>
            <option value="en" <?php if ($language == "en") echo "selected"; ?>>En</option>
        </select>
    </form>

    
    <p><?php echo getWord($conn, '<more1>', $language); ?></p>
    <p><?php echo getWord($conn, '<tel2>', $language); ?>:<?php echo getWord($conn, '<tel>', $language); ?></p>
    <p><?php echo getWord($conn, '<address3>', $language); ?>:<?php echo getWord($conn, '<address>', $language); ?></p>
    <p><?php echo getWord($conn, '<address3>', $language); ?>:<?php echo getWord($conn, '<address2>', $language); ?></p>

    </body>
    </html>



    

