<?php 
    session_start();
    include "../../connection.php";
    if(isset($_POST['logoutBtn'])){
        session_destroy();
        header("Location: adminLogin.php");
        exit();
    }
?>