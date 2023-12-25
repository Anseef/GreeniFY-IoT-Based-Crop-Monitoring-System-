<?php include "../connection.php";
    session_name("userSession");
    session_start();
    error_reporting(0);
?>
<div class="Chart weekly-Chart">
    <div class="barchart-head">
        <h2>Sensor Reading</h2>
        <select name="week-switch" onchange="filterChart(this)">
            <option value="2">Weekly</option>
            <option value="1">Monthly</option>
        </select>
    </div>
    <?php 
        if(!$_SESSION['username']){
            echo "<span class='chartError'>No Results Found</span>";
        }else{
            echo "
                <div class='barChart'>
                    <span class='errorField'></span>
                    <canvas id='barChart'><canvas>
                </div>";
        }
    ?>
</div>
<div class="Chart pie-Chart">
    <h2>Plant Growth</h2>
    <?php 
        if(!$_SESSION['username']){
            echo "<span class='chartError'>No Results Found</span>";
        }else {
            echo "
                <div class='plantAge'>
                    <span class='errorField'></span>
                    <canvas id='plantAge'></canvas>
                </div>";
        }
    ?>
</div>
<div class="Chart line-Chart">
    <h2>Pump Status</h2>
    <?php 
        if(!$_SESSION['username']){
            echo "<span class='chartError'>No Results Found</span>";
        }else{
            echo "
                <div class='pumpReading'>
                   <span class='errorField'></span>
                   <canvas id='pumpReading'></canvas>
                </div>";
        }
    ?>
</div>
<div class="Chart dot-Chart">
    <div class="dotchart-head">
        <h2>Daily Reading</h2>
    </div>
    <?php 
        if(!$_SESSION['username']){
            echo "<span class='chartError'>No Results Found</span>";
        }else {
            echo "
                <div class='dailyChart'>
                    <span class='errorField'></span>
                    <canvas id='dotChart'></canvas>
                </div>";
        }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>