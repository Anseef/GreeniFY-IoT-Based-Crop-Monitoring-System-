<?php include "../connection.php";
    session_start();
    if(isset($_SESSION['username'])){
        $sessionUser = $_SESSION['username']; 
        $farmDetails = "SELECT * FROM FarmDetails
        INNER JOIN signup ON signup.farmID = FarmDetails.farmID WHERE signup.username = '$sessionUser'";
        $farmDetailsResult = mysqli_query($conn, $farmDetails);
        if (mysqli_num_rows($farmDetailsResult) > 0) {
            $farmData = mysqli_fetch_assoc($farmDetailsResult);
            $tableName = $farmData['cropName'];
            $fetchSrData = "SELECT mvalue,tvalue,hvalue FROM $tableName WHERE id = (SELECT MAX(id) FROM $tableName)";
            $fetchSrDataResult = mysqli_query($conn, $fetchSrData);
            if(mysqli_num_rows($fetchSrDataResult) > 0){
                while($srReading = mysqli_fetch_assoc($fetchSrDataResult)){
                    $moistureValue = $srReading['mvalue'];
                    $temperatureValue = $srReading['tvalue'];
                    $humidityValue = $srReading['hvalue'];
                }
            }else{
                $moistureValue = 0;
                $temperatureValue = 0;
                $humidityValue = 0;
            }
        }
    }
?>