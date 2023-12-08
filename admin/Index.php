<?php

include_once './DB.php';

class User
{
    static public function all()
    {
        $sql = "SELECT users.user_id, users.full_name, users.phone_number, users.email, 
                accounts.username, accounts.password, roles.role
                FROM users
                INNER JOIN accounts ON users.user_id = accounts.user_id
                INNER JOIN roles ON users.user_id = roles.user_id";
        
        $users = DB::execute($sql);
        return $users;
    }
    static public function delete($userId)
    {
        $sql = "DELETE FROM users WHERE user_id = '$userId'";
        
        try {
            DB::execute($sql);
            return true; // Trả về true nếu xóa thành công
        } catch (Exception $e) {
            return false; // Trả về false nếu xóa không thành công
        }
    }
}



?>





