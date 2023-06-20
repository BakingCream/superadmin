<?php
    include_once('../../config/database.php');
    include_once('../model/Login.php');

    $action = $_GET['action'];
    $Login = new Login($conn);
    
    if($action == "login")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $request = [
            'username' => $username,
            'password' => $password
        ];

        $result = $Login->login($request);

        echo json_encode($result);
    }

    else if($action == "logout")
    {
        session_destroy();
        $result = [
            'status' => 'success',
            'message' => 'Logout successful.'
        ];
        echo json_encode($result);
    }

    else if($action == "forgotPassword")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $request = [
            'email' => $email,
            'password' => $password
        ];

        $result = $Login->forgotPassword($request);

        echo json_encode($result);
    }
    
?>