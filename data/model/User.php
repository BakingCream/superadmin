<?php 
    date_default_timezone_set('Asia/Manila');

    class User {
        private $connection;
        
        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function checkOldPassword($request)
        {
            $oldPassword = $request['oldPassword'];
            $adminId = $request['adminId'];
            
            $sql = "SELECT * FROM users WHERE USER_ID = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $adminId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $passwordCheck = password_verify($oldPassword, $row['PASSWORD']);

            return $passwordCheck;
        }

        public function changePassword($request)
        {
            $newPassword = $request['newPassword'];
            $adminId = $request['adminId'];
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET PASSWORD = ? WHERE USER_ID = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('ss', $newPassword, $adminId);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

    }
?>