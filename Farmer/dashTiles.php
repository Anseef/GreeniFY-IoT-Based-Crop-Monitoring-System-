<?php include "../connection.php";
    session_name("userSession");
    session_start();
<<<<<<< HEAD
    error_reporting(0);
    include "dashboard.php";
=======
    include "dashboard.php";
    error_reporting(0);
>>>>>>> 7f15b4c0ce32e510d4c1f6abf952bec6071b8fe5
?>

<div class="tile moisture">
    <div class="sensor-img" style="background-image: url(images/Sensors/moisture.png);"></div>
    <div class="sensor-value">
        <h2>Moisture</h2>
        <span>
            <?php if(isset($_SESSION['username'])){
                echo $moistureValue."%";
            }else{
                echo "0";
            }?>
        </span>
    </div>
</div>
<div class="tile temperature">
    <div class="sensor-img" style="background-image: url(images/Sensors/temperature.png);"></div>
    <div class="sensor-value">
        <h2>Temperature</h2>
        <span>
            <?php if(isset($_SESSION['username'])){
                echo $temperatureValue."%";
            }else{
                echo "0";
            }?>
        </span>
    </div>
</div>
<div class="tile humidity">
    <div class="sensor-img" style="background-image: url(images/Sensors/humidity.png);"></div>
    <div class="sensor-value">
        <h2>Humidity</h2>
        <span>
            <?php if(isset($_SESSION['username'])){
                echo $humidityValue."%";
            }else{
                echo "0";
            }?>
        </span>
    </div>
</div>
<div class="tile sensors">
    <div class="sensor-img" style="background-image: url(images/Sensors/soil-moisture.png);"></div>
    <div class="sensor-value">
        <h2>Sensors</h2>
        <span>
            <?php if(isset($_SESSION['username'])){
                echo "3";
            }else{
                echo "0";
            }?>
        </span>
    </div>
</div>