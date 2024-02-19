<!DOCTYPE html>
<html>
<head>
    <title>CSVProcessor</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Σύνδεση με το αρχείο CSS -->
</head>
<body>
    <table>
        <div class="title-table">
            <h1>CSVProcessor</h1><br>
            <?php if(!empty($currentPath)):?> <!-- Έλεγχος για την ύπαρξη της διαδρομής του τρέχοντος αρχείου CSV -->
                <h3 class="path-title" style="background-color: hwb(98 15% 10%);">Csv File Path: <?= $currentPath?></h3>
            <?php endif ?>
            <?php if(!empty($sorted)):?>
                <h3 style="background-color: hwb(98 15% 10%);"><?= $sorted?></h3>
            <?php endif ?>
            <?php if(!empty($scoreSum)):?>
                <h3 style="color:white; background-color:hwb(98 15% 30%);"><?='Total Score '. $scoreSum?></h3>
                <?php endif ?>                
                            
        </div>    
        <thead>
            <tr>
                <!-- Κουμπί για την εμφάνιση του επιλεγμένου αρχείου CSV -->
                <th colspan="2" style="font-size: 1.2rem;">Read Csv Files
                    <h4 style="color:yellow; background-color:hwb(98 15% 30%);">
                        <?php if (!empty($selectedFile)): ?>
                            <?=$selectedFile?>                            
                        <?php endif ?>
                    </h4>
                </th>
                <td>
                    <!-- Φόρμα για την επιλογή ενός αρχείου CSV -->
                    <form method="POST" action="../public/index.php">
                        <select name="filter_field_Single">
                            <option value="" selected>Choose file</option>
                            <?php if (!empty($fileNames)): ?>
                                <?php foreach($fileNames as $filename):?>
                                    <option value="<?= $filename ?>"><?= $filename ?></option>
                                <?php endforeach ?>
                            <?php endif ?> 
                        </select><br><br>
                        <button style="margin-top:20px; height:70px" type="submit" name="dispSingleCsv_btn">Display file</button>
                    </form>
                </td>
                <!-- Κουμπί για την εμφάνιση όλων των αρχείων CSV -->
                <th colspan="2" style="font-size: 1.2rem;">Create All Csv Files</th>
                <form method="post" action="../public/index.php">
                    <td>                       
                        <button style="margin-top:80px; height:70px" type="submit" name="dispAllCsv_btn" >Create file</button>
                    </td>
                </form>

                <!-- Φίλτρο για αναζήτηση στα δεδομένα -->
                <th colspan="1" style="font-size: 1.2rem;">Filter By </th>
                <td >
                    <form method="POST" action="../public/index.php">
                        <?php if (!file_exists('allData.csv')): ?>
                            <select id="filter_field-search" name="filter_field-search">
                                <option value="" selected>Choose action</option>
                                <option value="Id">Id</option>
                                <option value="Name">Name</option>
                                <option value="Score">Score</option>
                                <option value="Email">Email</option>
                                <option value="Age">Age</option>
                        </select><br><br>
                        <?php endif; ?> 
                        <input id="search_value" type="text" name="search_value" placeholder="Enter value"><br><br>
                        <button style="height:40px" type="submit" name="Search_btn">Search</button>
                    </form>
                </td>
                <th colspan="2" style="font-size: 1.2rem;">Create Sql Script</th>
                <!-- Δημιουργία SQL εντολών -->
                <td colspan="2" > 
                    <form method="POST" action="../public/index.php">
                        <input id="createValuedb" type="text" name="createSqldb" placeholder="Enter name Db"><br><br>
                        <input id="createValuetable" type="text" name="createStable" placeholder="Enter name Table"><br><br>
                        <button style="height:40px"  type="submit" name="Create-Sql">Create Sql</button>
                    </form>
                </td>
            </tr>
            
        </thead>

        <thead>
            <tr>
                <!-- Επικεφαλίδες πίνακα -->
                <?php require '../app/singleBtnAction.php'; // Συμπερίληψη αρχείου με ενέργειες για το κουμπί ?>

                <!-- Επικεφαλίδες από αρχείο CSV -->
                <?php if (empty($headerDataR) && (empty($headers))):?>
                    <!-- <th></th>
                    <th></th>
                    <th></th>                    
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th> -->
                <?php else: ?>
                    <?php if (!empty($headerDataR)):?>
                        <th style="color:black; background-color:hwb(98 15% 10%); padding:15px 0; font-size: 1rem;">Registry</th>
                        <!-- Επικεφαλίδες επιλεγμένου αρχείου CSV -->
                        <?php foreach ($headerDataR as $header): ?>
                            <th style="color:black; background-color:hwb(98 15% 10%); padding:15px 0; font-size: 1rem;"><?= $header ?></th>
                        <?php endforeach; ?>
                    <?php endif ?>
                <?php endif ?> 
                <?php if(!empty($headers)):?>
                    <!-- Επικεφαλίδες όλων των αρχείων CSV -->
                    <th style="color:black; background-color:hwb(98 15% 10%); padding:15px 0; font-size: 1rem;">Registry</th>
                    <?php foreach($headers as $title):?>
                        <?php foreach($title as $titleValue):?>
                            <th style="color:black; background-color:hwb(98 15% 10%);padding:15px 0; font-size: 1rem;"><?=$titleValue?></th>
                        <?php endforeach?> 
                    <?php endforeach?>       
                <?php endif ?>
                
            </tr>
        </thead>
        <tbody>
            <!-- Εμφάνιση δεδομένων από επιλεγμένο αρχείο CSV -->
            <?php if (!empty($csvDatasR)): ?>
                <?php $cnt = 0; foreach($csvDatasR as $data): ?>
                    <?php   $cnt++?>
                    <tr class ="single-data-tr">
                        <td><?= $cnt?></td>
                        <?php foreach($data as $valueOfData):?>
                            <td><?= $valueOfData ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            
            <!-- Εμφάνιση δεδομένων από όλα τα αρχεία CSV -->
            <?php  if (!empty($csvFormatData )): ?>
                <?php $cnt = 0; foreach($csvFormatData as $datacsv): ?>
                    <?php foreach($datacsv as $Data):?>
                        <?php   $cnt++?>
                        <tr class="all-data-tr">
                        <td><?= $cnt?></td>
                            <?php foreach($Data as $valueData):?>
                                <td><?= $valueData ?></td>                                
                            <?php endforeach ?> 
                        <?php endforeach ?>    
                    </tr>
                <?php endforeach ?>
            <?php endif ?>

            <!-- Εμφάνιση CSV -->
            <?php $cnt = 0; if (!empty($recordByVal)): ?>
                <?php if(!empty($headers)):?>
                    <?php foreach($recordByVal as $rec): ?>
                    <?php   $cnt++?>
                    <tr class="all-data-tr">
                    <td><?= $cnt?></td>
                        <?php foreach($rec as $valueRec): ?>
                            <td><?= $valueRec ?></td>                                
                        <?php endforeach ?> 
                    <?php endforeach ?>                             
                </tr>
            <?php endif ?> 
            <?php endif ?>
            <?php if (empty($recordByVal)): ?>
                <?php if (!empty($msg)): ?>
                    <tr>
                        <td style="color:red;">There is no entry with this data</td>
                    </tr>
            <?php endif ?>   
            <?php endif ?>   
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../scripts_jQuery/pleceHoldersDynamic.js" defer></script>
</body>
</html>
