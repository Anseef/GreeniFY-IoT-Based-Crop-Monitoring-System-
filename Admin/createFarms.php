<?php 
    include "../connection.php";
    session_name("adminSession");
    session_start();
    error_reporting(0);
    if (isset($_SESSION["admin"])){
        if (isset($_POST['createBtn'])) {
            $farmID = $_POST['farmID'];
            $farmName = $_POST['farmName'];
            $cropName = $_POST['cropName'];
            $createQuery = "INSERT INTO FarmDetails (farmID, farmName, cropName) VALUES ('$farmID', '$farmName', '$cropName')";
            $createResult = mysqli_query($conn, $createQuery);
            if ($createResult) {
                // Table Creation based on CropName;
                $createTable = "CREATE TABLE `$cropName` (
                    id INT AUTO_INCREMENT PRIMARY KEY,
<<<<<<< HEAD
=======
                    farmID VARCHAR(20),
>>>>>>> 7f15b4c0ce32e510d4c1f6abf952bec6071b8fe5
                    dates TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    status INT(11),
                    mvalue INT(11),
                    tvalue INT(11),
<<<<<<< HEAD
                    hvalue INT(11)
=======
                    hvalue INT(11),
                    FOREIGN KEY (farmID) REFERENCES FarmDetails(farmID)
>>>>>>> 7f15b4c0ce32e510d4c1f6abf952bec6071b8fe5
                )";
                $createTableResult = mysqli_query($conn, $createTable);
                if ($createTableResult) {
                    header('location:homePage.php');
                }
            }
        }
        if (isset($_POST['removeBtn'])) {
            $farmID = $_POST['farmIDRemove'];
            $farmName = $_POST['farmNameRemove'];
            $checkQuery = "SELECT farmID, farmName,cropName FROM FarmDetails WHERE farmID = '$farmID'";
            $checkResult = mysqli_query($conn, $checkQuery);
        
            if ($rowRemove = mysqli_fetch_assoc($checkResult)) {
                $storedFarmName = $rowRemove['farmName'];
                if ($storedFarmName === $farmName) {
                    $removeQuery = "DELETE FROM FarmDetails WHERE farmID = '$farmID'";
                    $removeResult = mysqli_query($conn, $removeQuery);
                
                    if ($removeResult) {
                        $tableName = $rowRemove['cropName'];
                        $removeTable = "DROP TABLE $tableName";
                        $removeTableResult = mysqli_query($conn, $removeTable);
                        if($removeTableResult){
                            header('location:homePage.php');
                        }                     
                    }
                }
            }
        }
    }else {
        header('location:homePage.php');
    }
?>