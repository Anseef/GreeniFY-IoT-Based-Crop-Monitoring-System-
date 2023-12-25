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
<h1>Sensor Status</h1>
<div class="status-blog">
    <div class="sensor-details">
        <h3>Moisture Sensor</h3>
        <?php if($moistureError || !$_SESSION['username']){
            echo "<i class='fa-solid fa-toggle-off'></i>";
        }else{
            echo "<i class='fa-solid fa-toggle-on'></i>";
        }
        ?>
    </div>
    <div class="sensor-details">
        <h3>Temperature Sensor</h3>
        <?php if($temperatureError || !$_SESSION['username']){
            echo "<i class='fa-solid fa-toggle-off'></i>";
        }else{
            echo "<i class='fa-solid fa-toggle-on'></i>";
        }
        ?>
    </div>
    <div class="sensor-details">
        <h3>Humidity Sensor</h3>
        <?php if($humidityError || !$_SESSION['username']){
            echo "<i class='fa-solid fa-toggle-off'></i>";
        }else{
            echo "<i class='fa-solid fa-toggle-on'></i>";
        }
        ?>
    </div>
</div>