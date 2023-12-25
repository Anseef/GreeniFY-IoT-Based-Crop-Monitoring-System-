<?php include "../connection.php";
    session_name("userSession");
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../Charts/chart.css">
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
                            if($_SESSION['username'])
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

            <div class="dashTiles">
                <?php include "dashTiles.php"; ?>
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
                    <?php include "sensorStatus.php" ?>
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
                <div class="chart-Container">
                    <?php include "chartContainer.php"; ?>
                </div>
                <div class="motto">
                    <h1>Life on a farm is a school of patience; you can't hurry the crops in two days.
                    </h1>
                </div>
                <div class="plant"></div>
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
                <?php
                    $adminDetails = "SELECT * FROM `AdminDetails`";
                    $adminDetailsResult = mysqli_query($conn,$adminDetails);
                    if(mysqli_num_rows($adminDetailsResult) > 0){
                        $admin = mysqli_fetch_assoc($adminDetailsResult);
                    }
                ?>
                <div class="blocks support">
                    <i class="fa-solid fa-message"></i>
                    <h3>Chat to support</h3>
                    <span>For more help</span>
                    <a href="mailto:<?php echo $admin['email'] ?>" ><?php echo $admin['email'] ?></a>
                </div>
                <div class="blocks location">
                    <i class="fa-solid fa-location-dot"></i>
                    <h3>Location</h3>
                    <span>To visit the office</span>
                    <a href="http://maps.google.com/">View on Google Maps</a>
                </div>
                <div class="blocks phone">
                    <i class="fa-solid fa-phone"></i>
                    <h3>Call</h3>
                    <span>Mon-Fri from 9AM to 5AM</span>
                    <p><?php echo $admin['phone_number'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
    <script src="navButton.js"></script>
    <script src="dateFetch.js"></script>
    <script src="autoUpdatingDiv.js"></script>
    <?php include_once "../Charts/Barchart.php" ?>
    <?php include_once "../Charts/Piechart.php" ?>
    <?php include_once "../Charts/Linechart.php" ?>
    <?php include_once "../Charts/Dotchart.php" ?>
</body>
</html>