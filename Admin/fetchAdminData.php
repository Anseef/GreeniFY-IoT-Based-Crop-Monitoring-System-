<?php 
    include "../connection.php";
    $selectQuery = "SELECT FarmDetails.farmID, FarmDetails.farmName, FarmDetails.cropName,
    COALESCE(signup.username, 'No Farmer') AS username, 
    signup.mobilenumber AS mobilenumber FROM FarmDetails 
    LEFT JOIN signup ON FarmDetails.farmID = signup.farmID;
    ";
    $selectResult = mysqli_query($conn, $selectQuery);
    if(mysqli_num_rows($selectResult) > 0) {
        while($row = mysqli_fetch_assoc($selectResult)){
            $farmIDArray[] = $row;
        }
    }
?>