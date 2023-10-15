<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminLogin.css">
</head>
<body>
    <div class="mainContainer">
        <div class="item1" style="background-image: url(../../Farmer/images/hanging.png)"></div>
        <div class="logoContainer">
            <img src="../../Farmer/images/logo1.png">
            <span class="logo">greeniFY</span>
        </div>

            <div class="loginContainer">
                <div class="block">
                    <form method="post" onsubmit="verification(event)">
                        <h1>Admin Login</h1>
                        <div class="input-box">
                            <div class="field">
                                <input type="text" placeholder="Username" name="username" id="userField">
                            </div>
                            <span id="usernameError"></span>
                        </div>
                        <div class="input-box">
                            <div class="field">
                                <input type="password" placeholder="Password" name="password" id="passField">
                            </div>
                            <span id="passwordError"></span>
                        </div>
                        <button type="submit" class="btn" name="loginBtn">Login</button>
                    </form>
                </div>
            </div>
    <div class="item3" style="background-image: url(../../Farmer/images/stand.png)">
    </div>
    <?php 
        include "../../connection.php";
        $adminDetails = "SELECT username,password FROM `AdminDetails`";
        $adminDetailsResult = mysqli_query($conn,$adminDetails);
        if(mysqli_num_rows($adminDetailsResult) > 0){
            $admin[] = mysqli_fetch_assoc($adminDetailsResult);
        } 
    ?>
</body>
<script>
    const adminDetails = <?php echo json_encode($admin); ?>
</script>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
<script src="loginValidation.js"></script>
</html>