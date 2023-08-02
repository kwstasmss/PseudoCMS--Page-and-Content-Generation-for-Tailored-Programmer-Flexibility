pages.php:

The pages.php file creates a connection to the database using the dbconnect.php file. It performs an SQL query to retrieve all pages from the "pages" table. Then, it generates an HTML list with the pages and presents their data in a table format. It also provides the option to add a new page through the "Add Page" link. It displays the contents and information of the pages in two languages (English and Greek) and offers an "Edit" link for editing purposes.

Το αρχείο pages.php δημιουργεί μια διασύνδεση με τη βάση δεδομένων, χρησιμοποιώντας το αρχείο dbconnect.php. Πραγματοποιεί μια ερώτηση SQL για να ανακτήσει όλες τις σελίδες από τον πίνακα "pages". Στη συνέχεια, δημιουργεί μια λίστα HTML με τις σελίδες και παρουσιάζει τα δεδομένα τους σε μορφή πίνακα. Προσφέρει επίσης τη δυνατότητα προσθήκης νέας σελίδας μέσω του συνδέσμου "Add Page". Εμφανίζει τα περιεχόμενα και τις πληροφορίες των σελίδων σε δύο γλώσσες (Αγγλικά και Ελληνικά) και παρέχει σύνδεσμο "Edit" για επεξεργασία.<br><br>

![1](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility/assets/140596070/bc7177cb-ef28-45b2-a213-917fcbd02ef0)


<br><br><br>

addpage.php:

The addpage.php file is responsible for connecting to the database using the dbconnect.php file. It creates a form that allows adding a new page. The form includes fields for the title, content, and SEO metadata in both English (EN) and Greek (GR) languages. It utilizes the generateSlug() function to create a unique slug from the title of the page in the English language, which serves as a unique URL for each page.The addpage.php file also checks if the user selects an image for the page and uploads it to the "img/" folder. Afterward, it inserts the data into the "pages" table of the database. This way, new pages can be added to the website with their respective information and content.

Το αρχείο addpage.php αναλαμβάνει τη σύνδεση με τη βάση δεδομένων, χρησιμοποιώντας το αρχείο dbconnect.php. Δημιουργεί μια φόρμα που επιτρέπει την προσθήκη νέας σελίδας. Η φόρμα περιλαμβάνει πεδία για τίτλο, περιεχόμενο και μεταδεδομένα SEO στις γλώσσες Αγγλικά (EN) και Ελληνικά (GR). Χρησιμοποιεί τη συνάρτηση generateSlug() για τη δημιουργία ενός μοναδικού slug από τον τίτλο της σελίδας στην Αγγλική γλώσσα, το οποίο χρησιμοποιείται ως μοναδικό URL για κάθε σελίδα. Αναγνωρίζει εάν ο χρήστης επιλέξει εικόνα για τη σελίδα και την ανεβάζει στον φάκελο "img/". Εισάγει τα δεδομένα στον πίνακα "pages" της βάσης δεδομένων.<br><br>

![2](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility/assets/140596070/616ca081-caf1-4a53-a975-e3db55b6562d)
![3](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility/assets/140596070/acc5eec1-955f-40a7-83f0-8d807e3afad4)
![4](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility/assets/140596070/11ef3707-eca1-4253-8206-3a0dda4ff84d)
![5](https://github.com/kwstasmss/PseudoCMS--Page-and-Content-Generation-for-Tailored-Programmer-Flexibility/assets/140596070/585017fb-29f2-4c73-9664-0d7a5e7c83aa)




<br><br><br>

editpage.php:

The file editpage.php handles the connection to the database using the dbconnect.php file. It retrieves the data of the page with the specified id from the "pages" table. Then, it displays an editing form with fields for the title, content, and SEO metadata in both English and Greek. The form allows selecting a new image for the page and displays the previously uploaded image (if available). When the user submits the form, the changes are recorded in the "pages" table of the database. If the update is successful, it displays the message "Page updated successfully!" and redirects the user to the "pages.php" page. However, in case of failure, it shows an error message along with relevant error information.

Το αρχείο editpage.php αναλαμβάνει τη σύνδεση με τη βάση δεδομένων, χρησιμοποιώντας το αρχείο dbconnect.php. Ανακτά τα δεδομένα της σελίδας με το καθορισμένο id από τον πίνακα "pages". Στη συνέχεια, εμφανίζει μια φόρμα επεξεργασίας με πεδία για τίτλο, περιεχόμενο και μεταδεδομένα SEO στα Αγγλικά και Ελληνικά. Η φόρμα προσφέρει τη δυνατότητα επιλογής νέας εικόνας για τη σελίδα και εμφανίζει την εικόνα που είχε ανέβει προηγουμένως (εάν υπάρχει). Καταχωρεί τις αλλαγές στον πίνακα "pages" της βάσης δεδομένων όταν ο χρήστης υποβάλει τη φόρμα. Σε περίπτωση επιτυχίας, εμφανίζει το μήνυμα "Page updated successfully!" και ανακατευθύνει το χρήστη στη σελίδα "pages.php". Σε περίπτωση αποτυχίας, εμφανίζει το μήνυμα λάθους και την αντίστοιχη πληροφορία λάθους.

<br><br><br>

insidepage.php:

The file insidepage.php handles the connection to the database using the dbconnect.php file. It checks whether the specified slug exists in the URL. If the slug exists, it searches for the corresponding page information from the "pages" table. If information for the slug is found, it displays the page data (title, content, image) in two available languages (English and Greek).If no information is found for the slug, it displays the message "Page not found." If no slug is specified, it displays the message "No slug specified."

Το αρχείο insidepage.php αναλαμβάνει τη σύνδεση με τη βάση δεδομένων, χρησιμοποιώντας το αρχείο dbconnect.php. Πραγματοποιεί έλεγχο για το αν υπάρχει το καθορισμένο slug στο URL. Αν υπάρχει το slug, αναζητά τις αντίστοιχες πληροφορίες της σελίδας από τον πίνακα "pages". Εάν βρεθούν πληροφορίες για το slug, εμφανίζει τα δεδομένα της σελίδας (τίτλος, περιεχόμενο, εικόνα) σε δύο διαθέσιμες γλώσσες (Αγγλικά και Ελληνικά). Εάν δεν βρεθούν πληροφορίες για το slug, εμφανίζει το μήνυμα "Η σελίδα δεν βρέθηκε.". Εάν δεν έχει καθοριστεί slug, εμφανίζει το μήνυμα "Δεν προσδιορίστηκε κανένα slug.".
