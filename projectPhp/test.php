<?php
// Συμπερίληψη της κλάσης CSVProcessor
require './app/App.php';

// Ορισμός του διαδρομής φακέλου για τα αρχεία CSV
$dirPath = 'files_csv';

// Δημιουργία ενός αντικειμένου CSVProcessor για τον χειρισμό των αρχείων CSV
$testProcessor = new CSVProcessor($dirPath);

// Λήψη των διαδρομών των αρχείων CSV
$filesCsvPath = $testProcessor->getFilesPaths();

// επικεφαλίδες από τα αρχεία CSV
$headers[] = $testProcessor->allHeadersCsv($filesCsvPath);

// Λήψη των δεδομένων από τα αρχεία CSV και αποθήκευσή τους σε $csvFormatData(array)
foreach ($headers as $header) {
    $csvFormatData[] = $testProcessor->allDataCsvFiles($headers, $filesCsvPath);
}

// Λήψη των δεδομένων από τo αρχείo allData με χρήση Φίλτρων
$selectedOption = 'Id';
$valueOption = '77254';
$directory = './files_csv/';
$filename = 'allData.csv';

$recordByVal = $testProcessor->findRecordByValue($filename, $directory, $selectedOption, $valueOption);

// Εμφάνιση Total score (sum)
$scoreSum = $testProcessor->calculateScoreSum($directory.$filename);

// Εμφάνιση των διαδρομών των αρχείων CSV
echo "Test 1: Διαδρομές Αρχείων CSV: <br>";
print_r($filesCsvPath);

// Εμφάνιση των επικεφαλίδων των αρχείων CSV
echo '<br><br><br>'."Test 2: Επικεφαλίδες Αρχείων CSV: <br>";
print_r($headers);

// Εμφάνιση των δεδομένων από τα αρχεία CSV
echo '<br><br><br>'."Test 3: Διάβασμα Αρχείου allData μετά από συγχώνευση και ταξινόμηση: <br>";
print_r($csvFormatData);

// Εμφάνιση των δεδομένων από το αρχείο allData με χρήση Φίλτρων
echo '<br><br><br>'."Test 4: Διάβασμα Αρχείου allData με χρήση Φίλτρων: <br>";
print_r($recordByVal);

// Εμφάνιση Total score (sum)
echo '<br><br><br>'."Test 5: Εμφάνιση Total score: <br>";
print_r($scoreSum);
?>



