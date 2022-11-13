<?php
class Connection
{
    public static function infoDataBase($db,$user="root",$pass="")
    {
        $infoDB = [
            "database"=>$db,
            "user"=>$user,
            "pass"=>$pass
        ];
        return $infoDB;
    }
    public static function connect($db)
    {
        try {
            //code...
            $link=new PDO("mysql:host=localhost;dbname=".Connection::infoDataBase($db)["database"].";charset=utf8mb4"
            ,Connection::infoDataBase($db)["user"]
        ,Connection::infoDataBase($db)["pass"]);
        } catch (PDOException $e) {
            //throw $th;
            die($e->getMessage());
        }
        return $link;
    }
}