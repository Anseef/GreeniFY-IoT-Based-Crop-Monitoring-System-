<?php
    session_name("adminSession");
    session_start();
    error_reporting(0);
    $url = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $farmID = $parts[4];
    $_SESSION['farmID'] = $farmID;
    include "dashData.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Charts/charts.css">
    <link rel="stylesheet" href="../styles.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-Container">
        <div class="navbarContainer">
            <div class="navbar">
                <div class="logoContainer">
                    <img src="../../Farmer/images/logo1.png">
                    <h2>greeniFY</h2>
                </div>
            </div>
        </div>
        <div class="dashboard">
            <div class="dashHeader">
                <h1><?php echo $farmData['farmName']; ?></h1>
                <div class="backBtn">
                    <i class="fa-solid fa-caret-left"></i>
                    <a href="../homePage.php">back</a>
                </div>
            </div>
            <div class="dash-Main">
                <div class="Chart weekly-Chart">
                    <div class="barchart-head">
                        <h2>Sensor Reading</h2>
                        <select name="week-switch" onchange="filterChart(this)">
                            <option value="2">Weekly</option>
                            <option value="1">Monthly</option>
                        </select>
                    </div>
                    <?php 
                        if(!$_SESSION['admin']){
                            echo "<span class='chartError'>No Results Found</span>";
                        }else{
                            echo "<div class='barChart'>
                                <span class='errorField'></span>
                                <canvas id='barChart'><canvas>
                                </div>";
                        }
                    ?>
                </div>
                <div class="Chart pie-Chart">
                    <h2>Plant Growth</h2>
                    <?php 
                        if(!$_SESSION['admin']){
                            echo "<span class='chartError'>No Results Found</span>";
                        }else{
                            echo "<div class='plantAge'>
                            <span class='errorField'></span>
                            <canvas id='plantAge'></canvas>
                            </div>";
                        }
                    ?>
                </div>
                <div class="motto">
                    <h3>If you tickle the earth with a hoe she laughs with a harvest!</h3>
                </div>
                <div class="info-Container">
                    <div class="farmer-Info">
                        <h2>Farmer info</h2>
                        <div class="farmer-list">
                            <table>
                                <?php include "farmerInfo.php" ?>
                            </table>
                        </div>
                    </div>
                    <?php include "sensorInfo.php"; ?>
                </div>
            <div class="image"></div>
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
<?php include_once "../Charts/Barchart.php" ?>
<?php include_once "../Charts/Piechart.php" ?>
</html>