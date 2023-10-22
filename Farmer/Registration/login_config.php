<?php
    session_name("userSession");
    session_start();
    include "../../connection.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $loginUser = $_POST['userFieldValue'];
        $_SESSION['username'] = $loginUser;
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $response = [
            'status' => 'success',
            'message' => 'Data received successfully.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    else {
        http_response_code(405);
        echo 'Method not allowed';
    }
?>