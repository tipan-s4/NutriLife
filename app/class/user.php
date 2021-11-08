<?php

class User extends Db{

    public function getUsersCount(){
        $sql = "SELECT * FROM users;";
        $query = $this->connect()->query($sql);
        if ($query) {
             while($data=$query->fetchAll()){
                return count($data);
            }
        }else{
            return false;
        }
    }

    public function createUsers($name, $lastName, $userName, $email, $pswd){
        $sql = "INSERT INTO users (nombre,apellidos,nombreUser,email,userPswd) VALUES (?, ?, ?, ?, ?);";//users
        $query = $this->connect()->prepare($sql);
        $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT);
        if ($query->execute([$name, $lastName, $userName, $email, $hashedPswd])) {
            return true;
        }else{
            return false;
        }

    }

    public function createUsersAux($age, $height, $weight, $idealw, $gender, $auxId){
        $sql = "INSERT INTO useraux (edad,altura,peso,pesoIdeal,genero,idUser) VALUES (?, ?, ?, ?, ?, ?);";

         $query = $this->connect()->prepare($sql);

         if ($query->execute([$age, $height, $weight, $idealw, $gender, $auxId])) {

             return true;
         }else{

             return false;
         }
 
    }

    public function finishAuxForm($auxId){
        $sql = "UPDATE users SET auxForm = 'S' WHERE idUser = ?;";

        $query = $this->connect()->prepare($sql);
        if ($query->execute([$auxId])) {

            return true;
        }else{
            return false;
        }
    }   

    public function getAuxForm($id){
        $sql = "SELECT * FROM useraux WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$id])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function updateAuxForm($age, $height, $weight, $idealw, $auxId){
        $sql = "UPDATE useraux SET edad = ?, altura = ?, peso = ?, pesoIdeal = ?  WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$age, $height, $weight, $idealw, $auxId])) {
                return true;
        }else{
                return false;
        }
    }

    function getUser($userName , $email){
        $sql = "SELECT * FROM users WHERE nombreUser = ? OR email = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$userName , $email])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
   }

   public function getUserById($id){
        $sql = "SELECT * FROM users WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$id])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function getUserByUsername($name){
        $sql = "SELECT * FROM users WHERE nombreUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$name])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function updateUserFirstName($nombre,$id){
        $sql = "UPDATE users SET nombre = ? WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$nombre,$id])) {
                return true;
        }else{
                return false;
        }
    }

    public function updateUserLastName($apellidos,$id){
        $sql = "UPDATE users SET apellidos = ? WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$apellidos,$id])) {
                return true;
        }else{
                return false;
        }
    }

    public function updateUsername($username,$id){
        $sql = "UPDATE users SET nombreUser = ? WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$username,$id])) {
                return true;
        }else{
                return false;
        }
    }

    public function deleteAccount($id){
        $sql = "DELETE FROM users WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$id])) {
                return true;
        }else{
                return false;
        }
    }

}
?>