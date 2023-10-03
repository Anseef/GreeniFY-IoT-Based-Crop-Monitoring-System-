<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mainContainer">
        <div class="item1" style="background-image: url(../images/hanging.png)"></div>
        <div class="logoContainer">
            <img src="../images/logo1.png">
            <span class="logo">greeniFY</span>
        </div>

             <!--login part -->

            <div class="loginContainer shown">
                <div class="block">
                    <form method="post" onsubmit="verification(event)">
                        <h1>Login</h1>
                        <div class="input-box">
                            <div class="field">
                                <input type="text" placeholder="Username" name="username" id="userField">
                                <i class="fa-solid fa-circle-exclamation exclamatory"></i>
                                <i class="fa-solid fa-circle-check success"></i>
                            </div>
                            <span id="usernameError"></span>
                        </div>
                        <div class="input-box">
                            <div class="field">
                                <input type="password" placeholder="Password" name="password" id="passField">
                                <i class="fa-solid fa-circle-exclamation exclamatory"></i>
                                <i class="fa-solid fa-circle-check success"></i>
                            </div>
                            <span id="passwordError"></span>
                        </div>
                        <button type="submit" class="btn" name="loginBtn">Login</button>
                        <div class="signup">
                            <p>Dont have an account?<a class="signUpSwitch"> Signup</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Signup part-->

            <div class="signUpContainer">
                <div class="block">
                    <form method="post" onsubmit="return validate(event)">
                        <h1>Signup</h1>
                        <div class="input-box">
                            <div class="field">
                                <input type="text" placeholder="Farm ID" name="farmID" id="farmID">
                                <i class="fa-solid fa-circle-exclamation exclamatory"></i>
                                <i class="fa-solid fa-circle-check success"></i>
                            </div>
                            <span id="farmIDError"></span>
                        </div>
                        <div class="input-box">
                            <div class="field">
                                <input type="text" placeholder="Username" name="username" id="username">
                                <i class="fa-solid fa-circle-exclamation exclamatory"></i>
                                <i class="fa-solid fa-circle-check success"></i>
                            </div>
                            <span id="usernameError"></span>
                        </div>
                        <div class="input-box">
                            <div class="field">
                                <input type="text" placeholder="Phone Number" name="mobNumber" id="mobilenumber">
                                <i class="exclamatory fa-solid fa-circle-exclamation exclamatory"></i>
                                <i class="tick fa-solid fa-circle-check success"></i>
                            </div>
                            <span id="phonenumberError"></span>
                        </div>
                        <div class="input-box">
                            <div class="field">
                                <input type="password" placeholder="Password" name="password" id="password">
                                <i class="fa-solid fa-circle-exclamation exclamatory"></i>
                                <i class="fa-solid fa-circle-check success"></i>
                            </div>
                            <span id="passwordError"></span>
                        </div>
                        <button type="submit" class="btn" name="signupBtn">Signup</button>
                        <div class="signup">
                            <p>Already have an account?<a class="loginSwitch"> Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

    <div class="item3" style="background-image: url(../images/stand.png)">
    </div>
</body>
<?php include "fetchdata.php" ?>
<script>
    const signupArray = <?php echo json_encode($signupDataArray) ?>;
    const userDataArray = <?php echo json_encode($userDataArray) ?>;
</script>
<script src="signup_Validation.js"></script>
<script src="login_Validation.js"></script>
<script src="switch.js"></script>
<script src="https://kit.fontawesome.com/4cfe4e4dfd.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>