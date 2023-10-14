<?php 
    include "../connection.php";
    $selectQuery = "SELECT farmID from FarmDetails";
    $selectResult = mysqli_query($conn, $selectQuery);
    if(mysqli_num_rows($selectResult) > 0) {
        while($row = mysqli_fetch_assoc($selectResult)){
            $farmIDArray[] = $row;
        }
    }
?>