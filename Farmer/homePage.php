<?php include "../connection.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../Charts/charts.css">
    <title>GreeniFY</title>
</head>
<body>
    <!--                 HOMEPAGE            -->
    <div class="home-Container" id="Home">
        <div class="navbarContainer">
            <div class="navbar">
                <div class="logoContainer">
                    <img src="images/logo1.png">
                    <h2>greeniFY</h2>
                </div>
                <div class="headList">
                    <ul>
                        <li><a href="#Home">Home</a></li>
                        <li><a href="#Dashboard">Dashboard</a></li>
                        <li><a href="#Analytics">Analytics</a></li>
                        <li><a href="#Contact">Contact</a></li>
                    </ul>
                </div>
                <div class="headButtons">
                    <div class="signUp">
                        <?php 
                            if($_SESSION['username'] != '')
                            {
                                echo "<span><i class='fa-solid fa-user'></i>".$_SESSION['username']."</span>";
                            }
                        ?>
                    </div>
                    <form action="Registration/query.php" method="post">
                        <div class="login">
                            <button type="submit" name="logoutBtn"><?php if($_SESSION['username'] == ''){echo "Login";}else{echo "Logout";}?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bodyContainer">
            <div class="leftContainer">
                <h1>Plant It</h1>
                <h2>together.</h2>
            </div>
            <div class="rightContainer">
            </div>
            <div class="navButton">
                <a href="#Home"><i class="fa-solid fa-circle active"></i></a>
                <a href="#Dashboard"><i class="fa-solid fa-circle"></i></a>
                <a href="#Analytics"><i class="fa-solid fa-circle"></i></a>
                <a href="#Contact"><i class="fa-solid fa-circle"></i></a>
            </div>
        </div>
    </div>

    <!--                 DASHBOARD             -->
    <?php include "dashboard.php" ?>
    <div class="dash-Container" id="Dashboard">
        <div class="dashboard">
            <div class="dashHeader">
                <div class="heading">
                    <h1>Dashboard</h1>
                    <p>Hi <?php echo $_SESSION['username'] ?>, Welcome to GreeniFY</p>
                </div>
                <h1><?php echo $farmData['farmName'] ?></h1>
                <span><?php echo date('d-m-Y') ?></span>
            </div>
            <?php print_r($Dates); ?>
            <div class="dashTiles">
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
            </div>

            <div class="dash-Main">
                <div class="watering-Details">
                    <div class="header">
                        <div class="header-left">
                            <h1>Watering Details</h1>
                            <span class="currDate">Today</span>
                        </div>
                        <div class="header-right">
                            <div class="searchBar">
                                <form>
                                    <input placeholder="Enter date here" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="dateField"/>
                                    <button type="submit" name="datebtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="blocks">
                        <div class="details-block morning">
                            <h2>Morning</h2>
                            <div class="day-image" style="background: url(images/Day/Morning.png);"></div>
                            <div class="watering-time">
                                <?php if(!$_SESSION['username'] || !$_POST){echo "<span>No records</span>";} ?>
                            </div>
                        </div>
                        <div class="details-block afternoon">
                            <h2>Afternoon</h2>
                            <div class="day-image" style="background: url(images/Day/Afternoon.png);"></div>
                            <div class="watering-time">
                                <?php if(!$_SESSION['username'] || !$_POST){echo "<span>No records</span>";} ?>
                            </div>
                        </div>
                        <div class="details-block night">
                            <h2>Night</h2>
                            <div class="day-image" style="background: url(images/Day/Night.png);"></div>
                            <div class="watering-time">
                                <?php if(!$_SESSION['username'] || !$_POST){echo "<span>No records</span>";} ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sensor-Status">
                    <h1>Sensor Status</h1>
                    <div class="status-blog">
                        <div class="sensor-details">
                            <h3>Moisture Sensor</h3>
                            <?php if($error == 1 || !$_SESSION['username']){
                                echo "<i class='fa-solid fa-toggle-off'></i>";
                            }else{
                                echo "<i class='fa-solid fa-toggle-on'></i>";
                            }
                            ?>
                        </div>
                        <div class="sensor-details">
                            <h3>Temperature Sensor</h3>
                            <?php if($error == 2 || !$_SESSION['username']){
                                echo "<i class='fa-solid fa-toggle-off'></i>";
                            }else{
                                echo "<i class='fa-solid fa-toggle-on'></i>";
                            }
                            ?>
                        </div>
                        <div class="sensor-details">
                            <h3>Humidity Sensor</h3>
                            <?php if($error == 3 || !$_SESSION['username']){
                                echo "<i class='fa-solid fa-toggle-off'></i>";
                            }else{
                                echo "<i class='fa-solid fa-toggle-on'></i>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
                    <!-- Analytics -->
    <div class="analytics-Container" id="Analytics">
        <div class="analytics">
            <div class="header">
                <h1>Analytics</h1>
            </div>
            <div class="analytics-Main">
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
                        }
                    ?>
                    <div class='barChart'>
                        <canvas id='barChart'><canvas>
                    </div>
                </div>
                <div class="Chart pie-Chart">
                    <h2>Plant Growth</h2>
                    <?php 
                        if(!$_SESSION['username']){
                            echo "<span class='chartError'>No Results Found</span>";
                        }
                    ?>
                    <div class='plantAge'>
                        <canvas id='plantAge'></canvas>
                    </div>
                </div>
                <div class="Chart line-Chart">
                    <h2>Pump Status</h2>
                    <?php 
                        if(!$_SESSION['username']){
                            echo "<span class='chartError'>No Results Found</span>";
                        }
                    ?>
                    <div class='pumpReading'>
                        <canvas id='pumpReading'></canvas>
                    </div>
                </div>
                <div class="Chart dot-Chart">
                    <div class="dotchart-head">
                        <h2>Daily Reading</h2>
                    </div>
                    <?php 
                        if(!$_SESSION['username']){
                            echo "<span class='chartError'>No Results Found</span>";
                        }
                    ?>
                    <div class='dailyChart'>
                        <canvas id='dotChart'></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-Container" id="Contact">
        <div class="contact">
            <div class="header">
                <h1>Admin Contact</h1>
                <span>Feel free to reach out if you need anything.I'm here for you.</span>
            </div>
            <div class="contact-Main">
                <div class="blocks support">
                    <i class="fa-solid fa-message"></i>
                    <h3>Chat to support</h3>
                    <span>For more help</span>
                    <a href="/">admin@Greenify.com</a>
                </div>
                <div class="blocks location">
                    <i class="fa-solid fa-location-dot"></i>
                    <h3>Location</h3>
                    <span>To visit the office</span>
                    <a href="/">View on Google Maps</a>
                </div>
                <div class="blocks phone">
                    <i class="fa-solid fa-phone"></i>
                    <h3>Call</h3>
                    <span>Mon-Fri from 9AM to 5AM</span>
                    <p>+91 9999999999</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
    <script src="script.js"></script>
    <script src="dataFetch.js"></script>
    <?php include_once "../Charts/Barchart.php" ?>
    <?php include_once "../Charts/Piechart.php" ?>
    <?php include_once "../Charts/Linechart.php" ?>
    <?php include_once "../Charts/Dotchart.php" ?>
</body>
</html>