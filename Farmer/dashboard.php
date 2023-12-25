<?php include "../connection.php";
    session_name("userSession");
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username'])){
        $sessionUser = $_SESSION['username']; 
        $farmDetails = "SELECT * FROM FarmDetails
        INNER JOIN signup ON signup.farmID = FarmDetails.farmID WHERE signup.username = '$sessionUser'";
        $farmDetailsResult = mysqli_query($conn, $farmDetails);
        if (mysqli_num_rows($farmDetailsResult) > 0) {
            $farmData = mysqli_fetch_assoc($farmDetailsResult);
            $_SESSION['tableName'] = $farmData['cropName'];
            $tableName = $_SESSION['tableName'];
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
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $enteredDate = $_POST['enteredDate'];
            $fetchDate = "SELECT dates from $tableName where DATE(dates) LIKE '%$enteredDate' AND status = 1";
            $fetchDateResult = mysqli_query($conn, $fetchDate);
            if(mysqli_num_rows($fetchDateResult) > 0){
                while($row = mysqli_fetch_array($fetchDateResult)){
                    $Dates[] = $row;
                }
            }
            echo json_encode($Dates);
        }
        //Sensor Status 
        if($moistureValue !== 0 && $humidityValue !== 0 && $temperatureValue !== 0){
            if($moistureValue < 15 || $moistureValue > 80) {
                $moistureError = true;
            }
            if($temperatureValue < 20 || $temperatureValue > 45) {
                $temperatureError = true;
            }
            if($humidityValue < 40  || $humidityValue > 110) {
                $humidityError = true;
            }
        }else {
            $moistureError = true;
            $temperatureError = true;
            $humidityError = true;
        }
    }
?>