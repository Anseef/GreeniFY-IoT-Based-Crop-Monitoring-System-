<?php
    session_start();
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
    <link rel="stylesheet" href="../style.css">
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
                    <div class="barChart">
                        <canvas id="barChart"><canvas>
                    </div>
                </div>
                <div class="Chart pie-Chart">
                    <h2>Plant Growth</h2>
                    <div class="plantAge">
                        <canvas id="plantAge"></canvas>
                    </div>
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