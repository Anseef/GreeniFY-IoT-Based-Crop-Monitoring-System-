<?php 
    session_name("adminSession");
    session_start();
    include "../../connection.php";
    if(isset($_POST['logoutBtn'])){
        session_unset();
        header("Location: adminLogin.php");
        exit();
    }
?>