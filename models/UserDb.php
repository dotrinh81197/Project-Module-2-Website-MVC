<?php

namespace model;

class UserDb
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function signUp($user)
    {

        $sql = "INSERT INTO `user` (`username`,`password`,`email`) VALUES (?,?,?);";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $user->username);
        $statement->bindParam(2, $user->password);
        $statement->bindParam(3, $user->email);

        return $statement->execute();
    }

    // public function signIn($user)
    // {

    //     $sql = "SELECT * `user` (`username`,`password`) VALUES (?,?);";
    //     $statement = $this->connection->prepare($sql);
    //     $statement->bindParam(1, $user->username);
    //     $statement->bindParam(2, $user->password);

    //     return $statement->execute();
    // }
    public function checkExistUsername($username)
    {

        $sql = "SELECT * FROM `user` WHERE `username`= '$username'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        if (isset($result) && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check exists user to login
    public function checkExistUser($username, $password)
    {

        $sql = "SELECT * FROM `user` WHERE  `username`='$username' AND `password`= '$password' ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        if (isset($result) && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkExistEmail($email)
    {

        $sql = "SELECT * FROM `user` WHERE `email`= '$email'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result);
        if (isset($result) && COUNT($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
