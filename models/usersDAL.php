<?php

include_once("Connection.php");
include_once("user.php");

class usersDAL {

    public static function listAll()
    {
        $connection = new Connection();

        $result = $connection->db->query("select * from usuarios");

        $listUsuarios = array();

        for($i=0; $i < mysqli_num_rows($result); $i++)
        {
            $arrUSer = $result->fetch_assoc();
            $newUser = new Users();
            $newUser->setUsername($arrUSer['username']);
            $newUser->setPassword($arrUSer['password']);
            $newUser->setEmail($arrUSer['email']);
            $listUsuarios[$i] = $newUser;
        }

        return $listUsuarios;

    }

    public static function findById($username)
    {
        $connection = new Connection();
        $result = $connection->db->query("select * from usuarios where username = '$username'");

        $usuarioActual = new Users();

        if(mysqli_num_rows($result) > 0)
        {
            $array_u = $result->fetch_assoc();
            $usuarioActual->setUsername($array_u['username']);
            $usuarioActual->setPassword($array_u['password']);
            $usuarioActual->setEmail($array_u['email']);
        }else{
            echo 'no se ha obtenido nada';
        }

        return $usuarioActual;
    }

    public static function insert($newUser)
    {
        $query = "INSERT INTO usuarios VALUES(?, ?, ?)";
        $username = $newUser->getUsername();
        $password = $newUser->getPassword();
        $email = $newUser->getEmail();
        $connection = new Connection();
        $preparedStatement = $connection->db->stmt_init();
        $preparedStatement->prepare($query);
        $preparedStatement->bind_param("sss",$username,$password,$email);
        $preparedStatement->execute();
        return true;
    }

    public static function update($updateUSer)
    {
        $username = $updateUSer->getUsername();
        $password = $updateUSer->getPassword();
        $email = $updateUSer->getEmail();
        $connection = new Connection();
        $stmt = "update usuarios set username = '$username', password = '$password', email = '$email' where username = '$username'";
        $resultado = $connection->db->query($stmt);
        return true;
    }

    public static function delete($username)
    {
        $connection = new Connection();
        $stmt = "delete from usuarios where username = '$username'";
        $resultado = $connection->db->query($stmt);
        return $resultado;
    }  
}