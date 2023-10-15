<?php
    include "../../connection.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $farmID = $_POST['farmID'];
        $uname = $_POST['username'];
        $mobileNumber = $_POST['mobilenumber'];
        $passWord = $_POST['password'];
        $insertQuery= "INSERT INTO signup (`farmID`, `username`, `mobilenumber`, `password`) VALUES ('$farmID', '$uname', '$mobileNumber', '$passWord')";
        mysqli_query($conn,$insertQuery);
    }
?>