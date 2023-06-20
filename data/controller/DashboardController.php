<?php
    include_once('../../config/database.php');
    include_once('../model/Dashboard.php');

    $action = $_GET['action'];
    $Dashboard = new Dashboard($conn);
    
    if($action == "addAdmin")
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $emailAddress = $_POST['emailAddress'];
        $department = $_POST['department'];
        $password = $_POST['password'];

        $request = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'emailAddress' => $emailAddress,
            'department' => $department,
            'password' => $password
        ];

        $result = $Dashboard->addAdmin($request);

        echo json_encode($result);
    }

    else if ($action == "loadAdminTable")
    {
        $result = $Dashboard->loadAdminTable();

        $tableRow = "";
        $counter = 1;

        foreach($result as $data)
        {
            $tableRow .= "<tr>";
            $tableRow .= "<td>" . $counter. "</td>";
            $tableRow .= "<td>" . $data['FULL_NAME'] . "</td>";
            $tableRow .= "<td>" . $data['DEPARTMENT'] . "</td>";
            $tableRow .= "<td>" . $data['EMAIL_ADDRESS'] . "</td>";
            $tableRow .= "</tr>";
            $counter++;
        }

        echo json_encode($tableRow);
    }
    
?>