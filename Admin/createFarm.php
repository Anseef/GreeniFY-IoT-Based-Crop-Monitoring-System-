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
                    farmID VARCHAR(20),
                    dates TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    status INT(11),
                    mvalue INT(11),
                    tvalue INT(11),
                    hvalue INT(11),
                    FOREIGN KEY (farmID) REFERENCES FarmDetails(farmID)
                )";
                $createTableResult = mysqli_query($conn, $createTable);
                if ($createTableResult) {
                    header('location:homePage.php');
                }
            }
        }
    }else {
        header('location:homePage.php');
    }
?>