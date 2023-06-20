<?php 
    date_default_timezone_set('Asia/Manila');

    class Login {
        private $connection;
        
        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function login($request)
        {
            $username = $request['username'];
            $password = $request['password'];

            $sql = "SELECT *, CONCAT(FIRST_NAME, ' ', LAST_NAME) AS FULL_NAME FROM users WHERE EMAIL_ADDRESS = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if($row['DEPARTMENT'] != 'Super Admin') {
                $result = [
                    'status' => 'error',
                    'message' => 'Invalid username or password.'
                ];
                return $result;
            }
            if(!$row) {
                $result = [
                    'status' => 'error',
                    'message' => 'Invalid username or password.'
                ];
                return $result;
            }
            $passwordCheck = password_verify($password, $row['PASSWORD']);

            if($row['ACCOUNT_STATUS'] == 0) {
                $result = [
                    'status' => 'error',
                    'message' => 'Account is locked. Please contact the administrator.'
                ];
                return $result;
            }
            if(!$passwordCheck) {
                $result = [
                    'status' => 'error',
                    'message' => 'Invalid username or password.'
                ];
                if($row['LOGIN_ATTEMPTS'] == 3) {
                    $this->Sql->lockAccount($username);
                    $result['message'] = 'Account is locked. Please contact the administrator.';
                } else {
                    $this->Sql->updateLoginAttempts($username);
                    $result['message'] = 'Invalid username or password. You have ' . (3 - $row['LOGIN_ATTEMPTS']) . ' attempts left.';
                }
            } else {
                $result = [
                    'status' => 'success',
                    'message' => 'Login successful.',
                    'data' => $row
                ];
                $_SESSION['user'] = $row;
            }

            return $result;
        }

        public function forgotPassword($request)
        {
            $email = $request['email'];
            $password = $request['password'];

            $userData = $this->Sql->getAdminByEmail($email);
            if(!$userData) {
                $result = [
                    'status' => 'error',
                    'message' => 'Email does not exist.'
                ];
                return $result;
            } else {
                $request = [
                    'user_id' => $userData[0]['USER_AUTHENTICATION_ID'],
                    'password' => $password
                ];
                $this->Administrator->resetPassword($request);

                $result = [
                    'status' => 'success',
                    'message' => 'Success'
                ];

                return $result;
            }
        }

    }
?>