<?php include "../connection.php";
    session_name("userSession");
    session_start();
    include "dashboard.php";
    error_reporting(0);
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