<?php

/**Δημιουργία Αντικειμένου CSVProcessor:

Η κλάση CSVProcessor αναλαμβάνει τη διαχείριση αρχείων CSV στον φάκελο που δηλώνεται ως παράμετρος κατά τη δημιουργία του αντικειμένου.

Λήψη Διαδρομών Αρχείων CSV:
Η μέθοδος getFilesPaths() επιστρέφει έναν πίνακα με τις διαδρομές των αρχείων CSV στον καθορισμένο φάκελο.

Λήψη Επικεφαλίδων από Αρχείο CSV:
Η μέθοδος headerInfo(string $currentFile): array επιστρέφει τις επικεφαλίδες ενός αρχείου CSV με δεδομένο το όνομά του.

Λήψη Δεδομένων από Αρχείο CSV:
Η μέθοδος getDataCsv(string $currentFile): array επιστρέφει τα δεδομένα από ένα αρχείο CSV με δεδομένο το όνομά του.

Λήψη Επικεφαλίδων από Όλα τα Αρχεία CSV:
Η μέθοδος allHeadersCsv(array $pathsCsvFiles): array επιστρέφει τις επικεφαλίδες όλων των αρχείων CSV που περιέχονται στον πίνακα $pathsCsvFiles.

Λήψη Δεδομένων από Όλα τα Αρχεία CSV:
Η μέθοδος allDataCsvFiles(array $headers, array $filesCsvPath): array επιστρέφει τα δεδομένα από όλα τα αρχεία CSV που βρίσκονται στον πίνακα $filesCsvPath, συνδυάζοντας τα με τις επικεφαλίδες που περιέχονται στον πίνακα $headers.*/


declare(strict_types = 1);

// Δήλωση της κλάσης CSVProcessor
class CSVProcessor {

    private $dirPath; // Μεταβλητή του φακέλου με τα αρχεία CSV

    // Κατασκευαστής της κλάσης
    public function __construct(string $dirPath) {
        $this->dirPath = $dirPath;
    }

    // Aνάγνωση των αρχείων στον φάκελο και επιστροφή τους ως πίνακας
    public function getFilesPaths(): array {
        $files = []; 
    
        // Εξερεύνηση του φακέλου με τα αρχεία
        foreach (scandir($this->dirPath) as $file) {
            $filePath = $this->dirPath . DIRECTORY_SEPARATOR . $file;
    
            if (is_file($filePath)) { // Έλεγχος αν το στοιχείο είναι αρχείο
                $files[] = $filePath; // Προσθήκη του αρχείου στον πίνακα
            }
        }
        return $files; 
    }
    
    // Λήψη των headers (επικεφαλίδων) από ένα αρχείο CSV
    public function headerInfo(string $currentFile): array {
        $headerData = []; 
    
        if (!file_exists($this->dirPath.$currentFile)) {
            trigger_error("File $currentFile could not be opened", E_USER_ERROR);
        } else {
            // Διάβασμα της πρώτης γραμμής από το επιλεγμένο αρχείο CSV
            $head = fopen($this->dirPath.$currentFile, 'r');
            if ($head !== false) {
                $headers = fgetcsv($head);
                if ($headers !== false) {
                    $headerData = $headers;
                }
                fclose($head); // Κλείσιμο του αρχείου μετά την ανάγνωση
            } else {
                trigger_error("Failed to open file $currentFile", E_USER_ERROR);
            }
        }
        
        return $headerData;
    }
    
    // Λήψη δεδομένων από ένα αρχείο CSV και επιστροφή τους ως πίνακα
    public function getDataCsv(string $currentFile): array{
        $csvDatas = [];

        if(!file_exists($this->dirPath.$currentFile)) {
            trigger_error("File $currentFile could not be opened", E_USER_ERROR);
        }else{
            if (($handle = fopen($this->dirPath.$currentFile, "r")) !== FALSE) {
                fgetcsv($handle ); // παραλψη επικεφαλίδας

                while (($row = fgetcsv($handle, 200, ",")) !== FALSE) {
                    $csvDatas [] = $row; // Προσθήκη κάθε γραμμής δεδομένων στον πίνακα
                }
                fclose($handle); 
            }
        }
        return $csvDatas;
    }
    //επικεφαλιδες από τα αρχεία CSV
    public function allHeadersCsv($pathsCsvFiles): array {
        
        $headers = [];

        foreach ($pathsCsvFiles as $path) {

            $file = fopen($path, 'r');

            if (!empty($file)) {

                while (($data = fgetcsv($file, 100, ",")) !== FALSE) {

                    foreach ($data as $singleHeader) {

                        if (!in_array($singleHeader, $headers)) {
                            $headers[] = $singleHeader;
                        }
                    }
                    break;
                }
                fclose($file);
            }
        }
        
        return $headers;
    }

    //δεδομένων από τα αρχεία CSV
    public function allDataCsvFiles($headers, $filesCsvPath): array {

        $allData = [];
        foreach ($filesCsvPath as $filePath) {
            $file = fopen($filePath, 'r'); 
    
            if ($file) {
                $bufferDataArray = [];
                $csvHeader = fgetcsv($file); 
    
                
                while (($data = fgetcsv($file)) !== false) {
                    $bufferDataArray[] = array_combine($csvHeader, $data); 
                }
    
                $allData[$filePath] = $bufferDataArray;
    
                fclose($file); 
            }
        }
        
        foreach ($allData as $entry) {
            foreach ($entry as $rec) {

                //  νέα εγγραφή με τα επιθυμητά στοιχεία
                // $newRecord = [
                //     'Id' => isset($rec['Id']) ? $rec['Id'] : '',
                //     'Name' => isset($rec['Name']) ? $rec['Name'] : '',
                //     'Score' => isset($rec['Score']) ? $rec['Score'] : '',
                //     'Log in' => isset($rec['Log in']) ? $rec['Log in'] : '',
                //     'Log out' => isset($rec['Log out']) ? $rec['Log out'] : '',
                //     'Date' => isset($rec['Date']) ? $rec['Date'] : '',
                //     'Email' => isset($rec['Email']) ? $rec['Email'] : '',
                //     'Age' => isset($rec['Age']) ? $rec['Age'] : '',
                //     'Country' => isset($rec['Country']) ? $rec['Country'] : '',
                //     'MobileNumber' => isset($rec['MobileNumber']) ? $rec['MobileNumber'] : '',
                    
                // ];
                $newRecord = [];

                foreach ($headers[0] as $header) {
                    // Έλεγχος αν υπάρχει το κλειδί στον πίνακα $rec και επιστροφή της τιμής, αλλιώς άδειο string
                    $newRecord[$header] = isset($rec[$header]) ? $rec[$header] : '';
                }
        
                // νέας εγγραφής στον πίνακα $records
                $records[] = $newRecord;
        
                // break;
            }
            
        }
        
        // ταξινόμηση βάσει της ημερομηνίας
        function sortByDate($a, $b) {
            return strcmp($a['Name'], $b['Name']);
        }
        //  ταξινομήσουμε τον πίνακα $records
        usort($records, 'sortByDate');
        

        return $records;
    }
    
    function array_to_csv($array, $headers, $filename,$directory){

        $file = $directory.$filename;

        if(!file_exists($file)){
            
            // Άνοιγμα του αρχείου CSV για εγγραφή
            $fp = fopen($file, 'w');  
            
            foreach($headers[0] as $head){
                $stringHeader[] = $head;
            }
            
            // Εγγραφή των επικεφαλίδων στο αρχείο CSV
            fputcsv($fp, array_map('trim', $stringHeader));

            
            // Εγγραφή των δεδομένων του πίνακα στο αρχείο CSV
            foreach ($array[0] as $row) {
                fputcsv($fp, array_map('trim', $row));
            }

            // Κλείσιμο του αρχείου CSV
            fclose($fp);
        }
    }

    function findRecordByValue($filename, $directory, $selectedOption, $valueOption) {
        $filePath = $directory . $filename;
        $file = fopen($filePath, 'r');
        
        $allrec = []; 
    
        $header = fgetcsv($file);
    
        if ($header !== false) {

            $selectIndex = array_search($selectedOption, $header);
        }
    
        // Εάν βρέθηκε η επιλεγμένη επικεφαλίδα
        if ($selectIndex !== false) {

            // Επαναφέρουμε το δείκτη στην αρχή του αρχείου
            fseek($file, 0);
            
            fgetcsv($file);

            while (($row = fgetcsv($file)) !== false) {
                // Ελέγχουμε αν η τιμή του επιλεγμένου πεδίου είναι ίση με την επιθυμητή τιμή
                if (isset($row[$selectIndex]) && $row[$selectIndex] === $valueOption) {
                    // Αποθηκεύουμε την εγγραφή
                    $allrec[] = $row;
                }
            }
        }
        fclose($file);
        
        return $allrec;
    }

    function calculateScoreSum($filePath){

        $file = fopen($filePath, 'r');
        $header = fgetcsv($file); 
        $scoreIndex = array_search('Score', $header); // Βρίσκει τον δείκτη της στήλης "Score"

        $sum = 0.0; // Αρχικοποιεί το άθροισμα
        if ($scoreIndex !== false) {

            // Διαβάζει τις γραμμές και υπολογίζει το άθροισμα
            while (($row = fgetcsv($file)) !== false) {
                
                if (isset($row[$scoreIndex]) && is_numeric($row[$scoreIndex])) {
                    $sum += (float) $row[$scoreIndex];
                }
            }
        }
        fclose($file);
    return number_format($sum); // Επιστρέφει το άθροισμα των τιμών
    }
    

    function createSqldb($filename, $directory, $selectedOption, $valueOptiondb, $valueOptionTable) {
        $host = 'localhost';
        $username = '';
        $password = '';
        $database = $valueOptiondb;
        // Δημιουργία του SQL script
        $sqlScript = '';
    
        $sqlScript .= "CREATE DATABASE IF NOT EXISTS $database;\n";
        
        // Δημιουργία Table
        $allDataTable = $valueOptionTable;
        
        // Εντολή για δημιουργία πίνακα στη βάση δεδομένων
        $sqlScript .= "USE $database;\n"; // Επιλογή της βάσης δεδομένων
        $sqlScript .= "CREATE TABLE IF NOT EXISTS $allDataTable (\n";
            
        // Διαβάζουμε το CSV αρχείο και προσθέτουμε τις στήλες στο SQL script
        $file = fopen($directory . $filename, 'r');

        $header = fgetcsv($file);
        foreach ($header as $columnName) {
            $sqlScript .= "$columnName VARCHAR(255),\n"; // Ορίζετε τον τύπο δεδομένων που ταιριάζει με τις ανάγκες σας
        }
        // Προσθήκη του πρωτεύοντος κλειδιού
        $sqlScript .= "PRIMARY KEY (Id)\n";
        $sqlScript .= ");\n";
        // $sqlScript .= "INSERT INTO $allDataTable (Id, Name, Score, `Log in`, `Log out`, Date, Email, Age, Country, `Mobile Number`) VALUES ";
        // Αρχικοποίηση της εντολής INSERT INTO
        $sqlScript .= "INSERT INTO $allDataTable (". implode(', ', $header) . ")\nVALUES ";
        
        while (($row = fgetcsv($file)) !== false) {
            $sqlScript .= "(";
            foreach ($row as $value) {            
                $sqlScript .= "'" . $value. "', ";
            }
            $sqlScript = rtrim($sqlScript, ', '); // Αφαίρεση του τελευταίου κόμμα
            $sqlScript .= "),\n"; // Ολοκλήρωση της γραμμής
        }
        $sqlScript = rtrim($sqlScript, ",\n"); // Αφαίρεση του τελευταίου , και αλλαγή γραμμής
        $sqlScript .= ";"; // Ολοκλήρωση της εντολής INSERT
        fclose($file); 

        // Όνομα αρχείου SQL
        $sqlFileName = 'create_db_allDataCsv.sql';

        // Δημιουργία αρχείου SQL και εγγραφή του SQL script
        file_put_contents('../create_db_script/'.$sqlFileName, $sqlScript);
    }
    
    


}

