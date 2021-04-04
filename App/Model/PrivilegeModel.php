<?php
    namespace App;
    use App\Model;

    class PrivilegeModel extends Model {


         /**
         * fetchPrivileges
         *
         * fetches an existing Privileges using the $userid
         *
         * @param string $Privilege     The Privilege that will be used in matching the closest user from the database.
         * @return array Anonymous
         */
        public function fetchUserPrivilegeById($userId)
        {
            
             $Sql = "SELECT * FROM `sys_user_privilege` WHERE userid = :userId";
            Parent::query($Sql);
            Parent::bindParams('userId', $userId);

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
    }
?>
