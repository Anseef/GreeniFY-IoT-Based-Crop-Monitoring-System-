<?php 
    include "fetchAdminData.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="swiper-config.css"/>
    <link rel="stylesheet" href="styles.css">
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
                    <form action="Login/logout.php" method="post">
                        <div class="login">
                            <button type="submit" name="logoutBtn"><?php if($_SESSION['admin'] == ''){echo "Login";}else{echo "Logout";}?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="home-Main">
            <div class="farm-block">
                <div class="header">
                    <div class="heading">
                        <h1>Welcome back</h1>
                        <span><?php echo $_SESSION['admin'] ?></span>
                    </div>
                    <div class="add-Farm">
                        <i class="fa-solid fa-plus"></i>
                        <button type="submit" name="addFarmBtn" id="addFarmBtn">Add Farm</button>
                    </div>
                </div>
                <div class="farm-MainContainer">
                    <h1>Farm List</h1>
                    <div class="farm-Main swiper">
                        <div class="swiper-wrapper"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="swiper-config.js"></script>
    <script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
    <script src="Farmslider.js"></script>
    <script>
        const farmIDArray = <?php echo json_encode($farmIDArray)?>;
    </script>
    <script src="farmCreation.js"></script>
    <script src="farmDetailsBlock.js"></script>
</body>
</html>