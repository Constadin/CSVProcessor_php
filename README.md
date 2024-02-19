//*
Περιβάλλον Ανάπτυξης
Visual Studio Code
PHP Server v3.0.2
PHP Intelephense
Css
jQuery
Sql

Test on PHP Server v3.0.2 and  XAMPP

Η εφαρμογή ξεκινά από τον κατάλογο αρχείων, 
public > index.php

Η εφαρμογή σας έχει 4 σημεία επαφής με τον χρήστη:

Στο επίπεδο  Read Csv Files
ο χρήστης, αφού τοποθετήσει τα αρχεία που θέλει να επεξεργαστεί στον φάκελο files_csv μπορεί να επιλέξει αρχεία CSV που θέλει να επεξεργαστεί από τον φάκελο files_csv και νατα οπτικοποιήσει μεσο του προγράμματος περιήγησης. Μετά την επιλογή των αρχείων με τα πεδία "choose file" και "display file", εμφανίζεται η πλήρης διαδρομή και το όνομα του κάθε αρχείου καθως και οι εγγραφές.


Στο επίπεδο "Create All Csv File", ο χρήστης έχει τη δυνατότητα να συγχωνεύσει οποιονδήποτε αριθμό αρχείων CSV, ανεξάρτητα από τον αριθμό των εγγραφών που περιέχει κάθε ένα και ανεξάρτητα από τις επικεφαλιδες (στήλες).

Η εφαρμογή διαβάζει δυναμικά τα δεδομένα από τα αρχεία CSV και τα ταξινομεί ανάλογα με τη στήλη που ορίζονται στη συνέχεια τα συγχωνεύει σε ένα αρχείο Στη συνέχεια, αθροίζει την κατηγορία βαθμολογίας όπως ζητήθηκε και εμφανίζει το αποτέλεσμα της συνολικής βαθμολογίας.(score)

Τα δεδομένα επίσης ταξινομούνται αλφαβητικά με βάση το όνομα της καταχώρησης για ευκολότερη ανάγνωση και αναζήτηση.

Αφού δημιουργηθεί το μεμονωμένο αρχείο "allData.csv", ο χρήστης μπορεί να το εμφανίσει στον browser επιλέγοντάς το από το προηγούμενο πεδίο "Read Csv Files".


Στο τρίτο επίπεδο, το "Filter By", ο χρήστης μπορεί να επιλέξει τον τρόπο αναζήτησης βάσει του ID, name, score, email ή age.

Αν υπάρχει εγγραφή με τις επιλεγμένες τιμές που ο χρήστης ζητάει, τότε εμφανίζονται όλες οι εγγραφές που περιέχουν αυτήν την τιμή.

Αν δεν υπάρχει καμία εγγραφή που να ικανοποιεί τα κριτήρια αναζήτησης που επέλεξε ο χρήστης, τότε εμφανίζεται το μήνυμα "There is no entry with this data".

Αυτό το επίπεδο προσφέρει στον χρήστη έναν τρόπο να φιλτράρει τα δεδομένα και να εξάγει μόνο τις εγγραφές που τον ενδιαφέρουν βάσει συγκεκριμένων κριτηρίων αναζήτησης.

Το τέταρτο επίπεδο αφορά στη δημιουργία ενός SQL script αρχείου μέσω μιας φόρμας, όπου ο χρήστης μπορεί να δώσει το όνομα για τη δημιουργία της βάσης δεδομένων και ένα όνομα για έναν πίνακα που θα περιέχει όλα τα δεδομένα από το αρχείο "allData.csv" που δημιουργήθηκε προηγουμένως.

Μετά το πάτημα του κουμπιού "Create SQL", θα δημιουργηθεί ένα SQL script αρχείο με όλα τα δεδομένα που περιέχει το αρχείο "allData.csv". Αυτό το script μπορεί ο χρήστης να το εισάγει σε κάποιο εργαλείο βάσης δεδομένων, όπως το phpMyAdmin ή το MySQL Workbench, για να δημιουργήσει τη βάση δεδομένων και τον αντίστοιχο πίνακα και να εισάγει τα δεδομένα από το αρχείο CSV στη βάση του.



//*App.php

Λήψη Διαδρομών Αρχείων CSV (getFilesPaths()): Αυτή η μέθοδος επιστρέφει έναν πίνακα με τις διαδρομές όλων των αρχείων CSV που βρίσκονται στον φάκελο που καθορίζεται κατά τη δημιουργία του αντικειμένου της κλάσης.

Λήψη Επικεφαλίδων από Αρχείο CSV (headerInfo()): Αυτή η μέθοδος επιστρέφει τις επικεφαλίδες ενός αρχείου CSV με δεδομένο το όνομά του.

Λήψη Δεδομένων από Αρχείο CSV (getDataCsv()): Αυτή η μέθοδος επιστρέφει τα δεδομένα από ένα αρχείο CSV με δεδομένο το όνομά του.

Λήψη Επικεφαλίδων από Όλα τα Αρχεία CSV (allHeadersCsv()): Αυτή η μέθοδος επιστρέφει τις επικεφαλίδες όλων των αρχείων CSV που περιέχονται στον πίνακα διαδρομών που περνάει ως όρισμα.

Λήψη Δεδομένων από Όλα τα Αρχεία CSV (allDataCsvFiles()): Αυτή η μέθοδος επιστρέφει τα δεδομένα από όλα τα αρχεία CSV που βρίσκονται στον πίνακα διαδρομών που περνάει ως όρισμα.

Δημιουργία Αρχείου SQL (createSqldb()): Αυτή η μέθοδος δημιουργεί ένα αρχείο SQL script που περιέχει εντολές SQL για τη δημιουργία μιας βάσης δεδομένων και πίνακα με  τα δεδομένα από τα αρχεία CSV.

/**Index.php:

Ορίζονται σταθερές για τις διαδρομές προς τους φακέλους και τα αρχεία.
Ορίζονται οι σταθερές APP_PATH, FILES_PATH, και VIEWS_PATH για τον κατάλογο της εφαρμογής, τα αρχεία CSV, και τα αρχεία προβολής HTML αντίστοιχα.
Φόρτωση Κλάσης Εφαρμογής:

Φορτώνεται το αρχείο κώδικα της εφαρμογής App.php.

Διαχείριση Αρχείων CSV:
Δημιουργείται ένα αντικείμενο CSVprocessor με τη διαδρομή προς τα αρχεία CSV.
Λαμβάνονται οι διαδρομές των αρχείων CSV μέσω της μεθόδου getFilesPaths().
Ανακτούνται τα ονόματα των αρχείων CSV με τη χρήση της συνάρτησης basename().

Επιλογή Αρχείου CSV:
Εάν υποβληθεί η φόρμα για την εμφάνιση ενός μόνο αρχείου CSV, λαμβάνεται η επιλεγμένη διαδρομή του αρχείου.
Ελέγχεται η ύπαρξη και επιστρέφεται το επιλεγμένο αρχείο CSV.

Εμφάνιση Όλων των Αρχείων CSV:
Εάν υποβληθεί η φόρμα για την εμφάνιση όλων των αρχείων CSV, λαμβάνονται οι επικεφαλίδες και τα δεδομένα όλων των αρχείων.
Χρησιμοποιείται η μέθοδος allHeadersCsv() για τις επικεφαλίδες και η allDataCsvFiles() για τα δεδομένα.


// Αναζήτηση δεδομένων στο αρχείο CSV

// Δημιουργία βάσης δεδομένων από το αρχείο CSV

Προβολή HTML:
Φορτώνεται το αρχείο HTML που περιέχει την προβολή των αποτελεσμάτων. */


//**singleBtnAction.php

/**Έλεγχος εάν έχει γίνει υποβολή της φόρμας dispSingleCsv_btn.
Αν έχει γίνει υποβολή της φόρμας, ελέγχει αν έχει επιλεγεί αρχείο.
Αν έχει επιλεγεί αρχείο, λαμβάνει τα δεδομένα της επικεφαλίδας από το επιλεγμένο αρχείο CSV και τα δεδομένα από το επιλεγμένο αρχείο CSV.

Τα δεδομένα της επικεφαλίδας αποθηκεύονται στη μεταβλητή $headerDataR.
Τα δεδομένα από το αρχείο CSV αποθηκεύονται στη μεταβλητή $csvDatasR.
Η λειτουργικότητα αυτή είναι υπεύθυνη για την εμφάνιση των δεδομένων από ένα επιλεγμένο αρχείο CSV όταν ο χρήστης πατάει το κουμπί "Display file" */

/**files_csv 

εδώ τοποθετούμε όλa τα αρχεία csv

/**pleceHoldersDynamic.js

Αλλαγη της default επιλογήw τιμής στη φόρμα σύμφωνα με αυτό που επιλέγει ο χρήστης στο αναδυόμενο πλαίσιο

/*create_db_allDataCsv.sql (sql script)

δημιουργία βάσης δεδομένων από το csv με βάση τις τιμές χρήστη
