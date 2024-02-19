<?php

/**Ορισμός Καταλόγων και Αρχείων:

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



// χρήση αυστηρών τύπων
declare(strict_types = 1);

// ριζικός κατάλογος
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

// Ορίζει σταθερές για τις διαδρομές προς τα φακέλους και τα αρχεία
define('APP_PATH', $root .'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root .'files_csv' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root .'views' . DIRECTORY_SEPARATOR);

// αρχείο κώδικα της εφαρμογής (App.php)
require APP_PATH .'App.php';

// αντικείμενο CSVprocessor με τη διαδρομή προς τα αρχεία CSV
$csvProssesor = new CSVprocessor(FILES_PATH);

// Λαμβάνει τις διαδρομές των αρχείων CSV
$filesCsvPath = $csvProssesor->getFilesPaths();
// print_r($filesCsvPath);

//  πίνακα με τα ονόματα των αρχείων CSV
$fileNames = [];

foreach($filesCsvPath  as $path){
    $fileName = basename($path);
    $fileNames[] = $fileName;
}


$currentPath ='';

if(isset($_POST['dispSingleCsv_btn'])){
    
// Ανάκτηση της επιλεγμένης τιμής από το πεδίο  της φόρμας
    $selectedFile = $_POST['filter_field_Single'];
    foreach($filesCsvPath  as $path){
        if($selectedFile === basename($path)){
            $currentPath = $path;
        }
    }
}

// Εμφάνιση όλων των data CSV    
if(isset($_POST['dispAllCsv_btn'])) { 

    $directory ='../files_csv/'; // Ορισμός του φακέλου όπου βρίσκονται τα αρχεία CSV
    $filename = 'allData.csv'; // Το όνομα του αρχείου CSV που θα δημιουργηθεί
    $filesArray = scandir($directory); //  αρχεία που υπάρχουν στο φάκελο
    
    if (!in_array($filename,  $filesArray )) { // Έλεγχος αν το αρχείο allData.csv υπάρχει ήδη

        $headers[] = $csvProssesor->allHeadersCsv($filesCsvPath);
        foreach($headers as $header) { 
            $csvFormatData[] = $csvProssesor->allDataCsvFiles($headers, $filesCsvPath); // Παίρνουμε όλα τα δεδομένα των αρχείων CSV
        }

        $sorted = 'Sorted By Name'; // Μήνυμα για επιτυχή ταξινόμηση
        
        $csvProssesor->array_to_csv($csvFormatData, $headers, $filename,$directory); //  δεδομένα σε αρχείο CSV
        $scoreSum = $csvProssesor->calculateScoreSum($directory.$filename);
        
        echo "Το αρχείο CSV δημιουργήθηκε με επιτυχία:" .$filename ; // Μήνυμα επιτυχούς δημιουργίας
    } else {
        echo "Το αρχείο " .$filename . " υπάρχει, επιλέξτε το πεδίο ανάγνωσης αρχείων"; 
    } 
}

// Αναζήτηση δεδομένων στο αρχείο CSV
if(isset($_POST['Search_btn'])) {

    $selectedOption = $_POST['filter_field-search'] ?? '';
    $valueOption = $_POST['search_value'] ?? '';
    $directory = '../files_csv/';
    $filename = 'allData.csv';
    
    if (file_exists($directory . $filename) && $selectedOption !== "" && $valueOption !==""){

            $headers[] = $csvProssesor->allHeadersCsv($filesCsvPath);
            $recordByValue = $csvProssesor->findRecordByValue($filename, $directory, $selectedOption, $valueOption);
            if(empty($recordByValue)){

                $msg = "true";
            }
            else{
                $recordByVal=$recordByValue;
            }
    } else if ((file_exists($directory . $filename) && $selectedOption !== "") || (file_exists($directory . $filename) && $valueOption !=="" ) ){
        
        echo "Παρακαλώ ... Συμπληρώστε όλα τα πεδία!!!";

    }else if (!file_exists($directory . $filename)){
        // Μήνυμα Το αρχείο δεν υπάρχει
        echo "Το αρχείο  $filename  ΔΕΝ ΥΠΑΡΧΕΙ στον φάκελο  $directory  Πατήστε την επιλογή Create File";
    }
}

// Δημιουργία βάσης δεδομένων από το αρχείο CSV
if(isset($_POST['Create-Sql'])){

    $selectedOption = $_POST['db_field'] ?? '';
    $valueOptiondb = $_POST['createSqldb'] ?? '';
    $valueOptionTable = $_POST['createStable'] ?? '';
    $directory = '../files_csv/';
    $filename = 'allData.csv';

    if (file_exists($directory . $filename)&& $valueOptiondb  !=="" && $valueOptionTable  !==""){

        $csvProssesor->createSqldb($filename, $directory, $selectedOption, $valueOptiondb, $valueOptionTable);
        
    } else if ((file_exists($directory . $filename) && $valueOptiondb !=="" ) || (file_exists($directory . $filename) && $valueOptionTable !=="" )){
        
        echo "Παρακαλώ ... Συμπληρώστε όλα τα πεδία!!!";

    }else if (!file_exists($directory . $filename)){
        // Μήνυμα Το αρχείο δεν υπάρχει
        echo "Το αρχείο  $filename  ΔΕΝ ΥΠΑΡΧΕΙ στον φάκελο  $directory  Πατήστε την επιλογή Create File";
    }

}

require VIEWS_PATH . 'display_html.php';

?>
