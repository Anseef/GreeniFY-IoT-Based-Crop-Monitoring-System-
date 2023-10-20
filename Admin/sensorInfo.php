<?php 
    session_start();
    include "../connection.php";
    include "dashData.php";
    if (isset($_SESSION['farmID']) && isset($_SESSION['admin'])) {
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
        if($moistureValue && $humidityValue && $temperatureValue){
            if($moistureValue < 15 || $moistureValue > 80) {
                $moistureError = true;
            }
            if($temperatureValue < 20 || $temperatureValue > 45) {
                $temperatureError = true;
            }
            if($humidityValue < 40  || $humidityValue > 110) {
                $humidityError = true;
            }
        }
    }
?>
<div class="sensor-Info">
    <h2>Sensor info</h2>
    <span>No of sensors: <?php echo isset($_SESSION['admin']) ? '3' : '0'; ?></span>
    <div class="varients">
        <div class="header">
            <h2>Varients</h2>
            <h2>Status</h2>
        </div>
        <div class="sensor-block">
            <span>Temperature Sensor</span>
            <div class="status">
                <span>
                    <?php 
                        if(isset($_SESSION['admin'])) {
                            if($temperatureError){
                                echo 'dead';
                            }else{
                                echo 'active';
                            }
                        }else{
                            echo 'inactive';
                        }
                    ?>
                </span>
            </div>
        </div>
        <div class="sensor-block">
            <span>Moisture Sensor</span>
            <div class="status">
                <span>
                    <?php 
                        if(isset($_SESSION['admin'])) {
                            if($moistureError){
                                echo 'dead';
                            }else{
                                echo 'active';
                            }
                        }else{
                            echo 'inactive';
                        }
                    ?>
                </span>
            </div>
        </div>
        <div class="sensor-block">
            <span>Humidity Sensor</span>
            <div class="status">
                <span>
                    <?php 
                        if(isset($_SESSION['admin'])) {
                            if($humidityError){
                                echo 'dead';
                            }else{
                                echo 'active';
                            }
                        }else{
                            echo 'inactive';
                        }
                    ?>
                </span>
            </div>
        </div>
    </div>
</div>