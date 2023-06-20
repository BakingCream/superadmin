<?php
    include_once('../../config/database.php');
    include_once('../model/User.php');

    $action = $_GET['action'];
    $User = new User($conn);
    
    if($action == "checkOldPassword")
    {
        $oldPassword = $_POST['oldPassword'];
        $adminId = $_POST['adminId'];

        $request = [
            'oldPassword' => $oldPassword,
            'adminId' => $adminId
        ];

        $result = $User->checkOldPassword($request);

        echo json_encode($result);
    }

    else if ($action == "changePassword")
    {
        $newPassword = $_POST['newPassword'];
        $adminId = $_POST['adminId'];

        $request = [
            'newPassword' => $newPassword,
            'adminId' => $adminId
        ];

        $result = $User->changePassword($request);

        echo json_encode($result);
    }
    
?>