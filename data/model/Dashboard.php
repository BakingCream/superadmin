<?php 
    date_default_timezone_set('Asia/Manila');

    class Dashboard {
        private $connection;
        
        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function addAdmin($request)
        {
            $firstName = $request['firstName'];
            $lastName = $request['lastName'];
            $emailAddress = $request['emailAddress'];
            $department = $request['department'];
            $password = $request['password'];
            // Hash password
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, DEPARTMENT, PASSWORD) VALUES(?,?,?,?,?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("sssss", $firstName, $lastName, $emailAddress, $department, $password);
            $stmt->execute();
            $stmt->close();

            return true;
        }

        public function loadAdminTable()
        {
            $sql = "SELECT *, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS FULL_NAME FROM users;";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            
            return $result;
        }
    }
?>