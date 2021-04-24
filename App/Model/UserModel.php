<?php
    namespace App;
    use App\Model;

   
    class UserModel extends Model {

         /**
         * createUser
         *
         * creates a new User
         *
         * @param array $payload  Contains all the fields that will be created.
         * @return array Anonymous
         */
        public static function createUser($payload)
        {
           $Sql = "INSERT INTO `sys_user_info` (loginid, pwd) VALUES (:loginid, :pwd )";
            Parent::query($Sql);
            // Bind Params...
     
            Parent::bindParams('loginid', $payload['userid']);
            Parent::bindParams('pwd', $payload['pwd']);
            // Parent::bindParams('created', $payload['created']);
            // Parent::bindParams('updated', $payload['updated']);

            $newUser = Parent::execute();
            //print( $newUser);
            if ($newUser) {
                $user_id = Parent::lastInsertedId();
                $payload['user_id'] = $user_id;
                $Response = array(
                    'status' => true,
                    'data' => $payload
                );
                return $Response;
            }

            $Response = array(
                'status' => false,
                'data' => []
            );
            return $Response;
        }

         /**
         * fetchUserById
         *
         * fetches a user by it's Id
         *
         * @param int $Id  The Id of the row to be fetched...
         * @return array Anonymous
         */
        public static function fetchUserById($Id)
        {
            $Sql = "SELECT id, firstName, lastName, email, created_at, updated_at FROM `db_users` WHERE id = :id";
            Parent::query($Sql);
            // Bind Params...
            Parent::bindParams('id', $Id);
            $Data = Parent::fetch();

            if (!empty($Data)) {
                return array(
                    'status' => true,
                    'data' => $Data
                );
            }

            return array(
                'status' => false,
                'data' => []
            );
        }

        /**
         * checkEmail
         *
         * fetches a user by it's email
         *
         * @param string $email  The email of the row to be fetched...
         * @return array Anonymous
         */
        public static function checkLoginId($loginid)
        {
            
            $Sql = "SELECT * FROM `sys_user_info` WHERE loginid = :loginid";
            Parent::query($Sql);
            // Bind Params...
            Parent::bindParams('loginid', $loginid);
            $loginidData = Parent::fetch();
            if (empty($loginidData)) {
                $Response = array(
                    'status' => false,
                    'data' => []
                );
                return $Response;
            }

            $Response = array(
                'status' => true,
                'data' => $loginidData
            );
            return $Response;
        }
    }
?>
