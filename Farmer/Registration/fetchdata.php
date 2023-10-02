<?php
    include "connection.php";
    // Farm ID Validation Data
    $signupQuery = "SELECT farmID FROM FarmDetails";
    $signupResult = mysqli_query($conn,$signupQuery);
    if(mysqli_num_rows($signupResult) > 0){
        while($row = mysqli_fetch_assoc($signupResult)){
            $signupDataArray[] = $row;
        }
    }

    //Login Validation Data 
    $userQuery = "SELECT `username`,`password` from signup";
    $userResult = mysqli_query($conn,$userQuery);
    if(mysqli_num_rows($userResult) > 0) {
        while($data = mysqli_fetch_assoc($userResult)){
            $userDataArray[] = $data;
        }
    }
?>