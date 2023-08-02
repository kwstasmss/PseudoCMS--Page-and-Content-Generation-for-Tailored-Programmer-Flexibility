functions.php:

Description: This file contains the functions used by other files to communicate with the database. It includes the functions getWord(), addWord(), updateWord(), and fetchWord(). The getWord() function retrieves a word from the database based on the format and the selected language. The addWord() and updateWord() functions are used to add and update words in the database, respectively. The fetchWord() function is used to retrieve the current values of a word based on its ID.

Περιγραφή: Αυτό το αρχείο περιέχει τις συναρτήσεις που χρησιμοποιούνται από τα άλλα αρχεία για την επικοινωνία με τη βάση δεδομένων. Περιλαμβάνει τις συναρτήσεις getWord(), addWord(), updateWord() και fetchWord(). Η συνάρτηση getWord() ανακτά μια λέξη από τη βάση δεδομένων βάσει του format και της επιλεγμένης γλώσσας. Οι συναρτήσεις addWord() και updateWord() χρησιμοποιούνται για την προσθήκη και ενημέρωση λέξεων στη βάση, αντίστοιχα. Η συνάρτηση fetchWord() χρησιμοποιείται για να ανακτήσει τις τρέχουσες τιμές μιας λέξης βάσει του ID της.

<br><br><br>

viewword.php:

Description: This file is a words display page. It presents a form with a drop-down menu for selecting the language (Greek or English). Users can choose a language and submit the form. When the form is submitted, the selected language is stored in the variable $_SESSION["language"]. The page is then refreshed and uses the getWord() function from the functions.php file to retrieve words from the database based on the Format. The Format is a code surrounded by "<" and ">" symbols (e.g., "<more1>") and is used to identify a specific word. The getWord() function then returns the word for the selected language (Greek or English) and displays the words on the webpage.

Περιγραφή: Αυτό το αρχείο είναι μια σελίδα προβολής λέξεων. Εμφανίζει μια φόρμα με ένα πεδίο επιλογής (drop-down) για την επιλογή της γλώσσας (Ελληνικά ή Αγγλικά). Οι χρήστες μπορούν να επιλέξουν μια γλώσσα και να υποβάλουν τη φόρμα. Όταν υποβάλλεται η φόρμα, η επιλεγμένη γλώσσα αποθηκεύεται στη μεταβλητή $_SESSION["language"]. Η σελίδα ανανεώνεται και χρησιμοποιεί την συνάρτηση getWord() από το αρχείο functions.php για να ανακτήσει λέξεις από τη βάση δεδομένων βάσει του Format. Το Format είναι ένας κωδικός που περιβάλλεται από σύμβολα "<" και ">" (π.χ. "<more1>") και χρησιμοποιείται για να αναγνωρίσει μια συγκεκριμένη λέξη. Στη συνέχεια, η συνάρτηση getWord() επιστρέφει τη λέξη για την επιλεγμένη γλώσσα (Ελληνικά ή Αγγλικά) και εμφανίζει τις λέξεις στην ιστοσελίδα.<br><br>
![1 viewword1](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/cfaa4d1d-cd87-4e41-b6ce-38469f23d259)
![2 viewword2](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/cbf99d05-1be7-4adf-885c-fdef2e9bdd75)


<br><br><br>

word.php:

Description: This file displays a list with all the words that exist in the database. Initially, it connects to the database and executes an SQL query to retrieve all the words, storing them in a variable $result. Then, using a while loop, it displays the words in a table with their corresponding information, such as ID, format, and the words in Greek and English languages. Additionally, it provides a link to add a new word, redirecting to the addword.php page.

Περιγραφή: Αυτό το αρχείο εμφανίζει μια λίστα με όλες τις λέξεις που υπάρχουν στη βάση δεδομένων. Αρχικά, συνδέεται στη βάση δεδομένων και εκτελεί ένα ερώτημα SQL για να ανακτήσει όλες τις λέξεις και τις αποθηκεύει σε μια μεταβλητή $result. Στη συνέχεια, χρησιμοποιώντας τη δομή επανάληψης while, εμφανίζει τις λέξεις σε μια πίνακα με τις αντίστοιχες πληροφορίες, όπως το ID, το format και τις λέξεις στις ελληνικές και αγγλικές γλώσσες. Επίσης, παρέχει ένα σύνδεσμο για να προσθέσετε μια νέα λέξη μεταβαίνοντας στη σελίδα addword.php.<br><br>
![3 word](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/1e6e88ca-57b7-449e-9ca0-9d059466d9d5)


<br><br><br>

addword.php:

Description: This file is responsible for handling the submission of a form by the user, adding a new word to the database. Initially, it checks if the form was submitted via POST. Then, it retrieves the values provided in the "Format," "Word (GR)," and "Word (EN)" fields and stores them in variables. It calls the addWord() function from the functions.php file, passing the field values as parameters, to add the new word to the database. Afterward, it redirects the user to the word.php page, where the list of all words will be displayed.

Περιγραφή: Αυτό το αρχείο αναλαμβάνει να δεχτεί την υποβολή μιας φόρμας από τον χρήστη που προσθέτει μια νέα λέξη στη βάση δεδομένων. Αρχικά, ελέγχει αν η φόρμα υποβλήθηκε μέσω POST. Στη συνέχεια, παίρνει τις τιμές που δόθηκαν στα πεδία "Format", "Λέξη (GR)" και "Λέξη (EN)" και τις αποθηκεύει σε μεταβλητές. Καλεί τη συνάρτηση addWord() από το αρχείο functions.php, περνώντας τις τιμές των πεδίων ως παραμέτρους, για να προσθέσει τη νέα λέξη στη βάση δεδομένων. Στη συνέχεια, ανακατευθύνει τον χρήστη στη σελίδα word.php, όπου θα εμφανίζεται η λίστα με όλες τις λέξεις.<br><br>

![4 addword1](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/4e84954b-496c-46d5-b37d-7af49d6b3628)

![5 addword2](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/afc81ae8-e3d5-4fa8-a796-c1b3c156475d)



<br><br><br>

ediword.php:

Description: This file handles the editing of an existing word in the database. If the form is submitted via POST, it retrieves the values provided in the "id," "Format," "Word (GR)," and "Word (EN)" fields and stores them in variables. It calls the updateWord() function from the functions.php file, passing the field values as parameters, to update the word in the database. Afterward, it redirects the user to the word.php page, where the list of all words will be displayed. If the form is not submitted via POST, it loads the current values of the word to be edited from the database and displays the form, adding the current values as default values for the corresponding fields.

Περιγραφή: Αυτό το αρχείο χειρίζεται την επεξεργασία μιας υπάρχουσας λέξης στη βάση δεδομένων. Εάν η φόρμα υποβληθεί μέσω POST, τότε παίρνει τις τιμές που δόθηκαν στα πεδία "id", "Format", "Λέξη (GR)" και "Λέξη (EN)" και τις αποθηκεύει σε μεταβλητές. Καλεί τη συνάρτηση updateWord() από το αρχείο functions.php, περνώντας τις τιμές των πεδίων ως παραμέτρους, για να ενημερώσει τη λέξη στη βάση δεδομένων. Στη συνέχεια, ανακατευθύνει τον χρήστη στη σελίδα word.php, όπου θα εμφανίζεται η λίστα με όλες τις λέξεις. Αν η φόρμα δεν υποβληθεί μέσω POST, τότε φορτώνει τις τρέχουσες τιμές της λέξης που πρόκειται να επεξεργαστεί, παίρνοντάς τις από τη βάση δεδομένων, και εμφανίζει τη φόρμα προσθέτοντας τις τρέχουσες τιμές ως προκαθορισμένες τιμές για τα αντίστοιχα πεδία.<br><br>

![6 edit1](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/0a73f6d3-6e95-4e3f-a7df-48197458cd10)

![7 edit2](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility-/assets/140596070/29afbcd6-8419-4bcd-89d8-c20f0aff967d)


