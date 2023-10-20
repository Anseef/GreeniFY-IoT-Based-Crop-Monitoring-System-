<?php 
    session_start();
    include "../connection.php";
    if (isset($_SESSION['farmID'])) {
        // Query to fetch farm data
        $currentFarmID =$_SESSION['farmID'];
        $farmQuery = "SELECT * FROM FarmDetails WHERE farmID = $currentFarmID";
        $farmQueryResult = mysqli_query($conn, $farmQuery);
        if (mysqli_num_rows($farmQueryResult) > 0) {
            $farmData = mysqli_fetch_assoc($farmQueryResult);
            $_SESSION['tableName'] = $farmData['cropName'];
        }
        // Query to fetch farmer data
        $farmerQuery = "SELECT * FROM signup WHERE farmID = $currentFarmID";
        $farmerResult = mysqli_query($conn, $farmerQuery);
        if (mysqli_num_rows($farmerResult) > 0) {
            $farmerDataArray = array();
            while ($farmerData = mysqli_fetch_assoc($farmerResult)) {
                $farmerDataArray[] = $farmerData;
            }
        }
    }
?>