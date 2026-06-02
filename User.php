<?php

require_once "Database.php";

class User extends Database
{
    public function register($name,$age,$mobile,$email,$password)
    {
        $role = "user";

        return $this->conn->query(
            "INSERT INTO user
            (name,age,mobileno,email,password,role)
            VALUES
            ('$name','$age','$mobile','$email','$password','$role')"
        );
    }

    public function login($email,$password)
    {
        return $this->conn->query(
            "SELECT * FROM user
             WHERE email='$email'
             AND password='$password'"
        );
    }

    public function getAllUsers()
    {
        return $this->conn->query(
            "SELECT * FROM user"
        );
    }

    public function getUserById($id)
    {
        $result = $this->conn->query(
            "SELECT * FROM user WHERE id=$id"
        );

        return $result->fetch_assoc();
    }

    public function updateUser($id,$name,$age,$mobile,$email)
    {
        return $this->conn->query(
            "UPDATE user SET
             name='$name',
             age='$age',
             mobileno='$mobile',
             email='$email'
             WHERE id=$id"
        );
    }

    public function deleteUser($id)
    {
        return $this->conn->query(
            "DELETE FROM user WHERE id=$id"
        );
    }
}
?>