<?php 
    include "fetchAdminData.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GreeniFY-AdminPanel</title>
</head>
<body>
    <div class="createFarmContainer">
        <div class="header">
            <i class="fa-solid fa-xmark"></i>
            <h1>Create Farm</h1>
        </div>
        <div class="createFarm-Main">
            <form action="createFarm.php" method="post" onsubmit="return validation()">
                <div class="input-block">
                    <label for="farmID">Farm ID</label>
                    <input type="text" name="farmID" id="farmID">
                    <span class="errorField"></span>
                </div>
                <div class="input-block">
                    <label for="farmName">Farm Name</label>
                    <input type="text" name="farmName">
                    <span class="errorField"></span>
                </div>
                <div class="input-block">
                    <label for="cropName">Crop Name</label>
                    <input type="text" name="cropName">
                    <span class="errorField"></span>
                </div>
                <button type="submit" name="createBtn">Create</button>
            </form>
        </div>
    </div>
    <div class="home-Container">
        <div class="navbarContainer">
            <div class="navbar">
                <div class="logoContainer">
                    <img src="../Farmer/images/logo1.png">
                    <h2>greeniFY</h2>
                </div>
                <div class="headButtons">
                    <div class="logout">
                        <button type="submit" name="logoutBtn">Logout</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-Main">
            <div class="farm-block">
                <div class="header">
                    <div class="heading">
                        <h1>Welcome back</h1>
                        <span>Andrew!</span>
                    </div>
                    <div class="add-Farm">
                        <i class="fa-solid fa-plus"></i>
                        <button type="submit" name="addFarmBtn" id="addFarmBtn">Add Farm</button>
                    </div>
                </div>
                <div class="farm-MainContainer">
                    <h1>Farm List</h1>
                    <div class="farm-Main">
                        <div class="blocks">
                            <i class="fa-solid fa-tractor"></i>
                            <h3>Tomato Farm</h3>
                            <span>Farmer in Charge: Sam</span>
                            <span>Contact: 9999999999</span>
                            <a href="/">View more details</a>
                        </div>
                        <div class="blocks">
                            <i class="fa-solid fa-tractor"></i>
                            <h3>Brinjal Farm</h3>
                            <span>Farmer in Charge: John</span>
                            <span>Contact: 9999999999</span>
                            <a href="/">View more details</a>
                        </div>
                        <div class="blocks">
                            <i class="fa-solid fa-tractor"></i>
                            <h3>Potato Farm</h3>
                            <span>Farmer in Charge: Zack</span>
                            <span>Contact: 9999999999</span>
                            <a href="/">View more details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
    <script>
        const farmIDArray = <?php echo json_encode($farmIDArray)?>;
    </script>
    <script src="farmCreation.js"></script>
</body>
</html>