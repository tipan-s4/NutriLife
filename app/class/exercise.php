<?php

class Exercise extends Db{

    public function getExerciseCount(){
        $sql = "SELECT * FROM ejercicios;";
        $query = $this->connect()->query($sql);
        if ($query) {
             while($data=$query->fetchAll()){
                return count($data);
            }
        }else{
            return false;
        }
    }

    public function getExercise(){
        $sql = "SELECT * FROM ejercicios;";
        $query = $this->connect()->query($sql);
        if ($query) {
             while($data=$query->fetchAll()){
                return $data;
            }
        }else{
            return false;
        }
    }

    public function addExerciseUser($exercise, $user, $date, $min){
        $sql = "INSERT INTO actividad (idActividad, idEjercicio, idUser, fecha, minutos) VALUES (NULL, ?, ?, ?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$exercise, $user, $date, $min])) {
            return true;
        }else{
            return false;
        }
    }

    public function addExerciseAdmin($name, $calorias){
        $sql = "INSERT INTO ejercicios (nombre, calorias) VALUES (?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$name, $calorias])) {
            return true;
        }else{
            return false;
        }
    }


    public function getExerciseByName($name){
        $sql = "SELECT * FROM ejercicios WHERE nombre LIKE '%$name%' OR nombre = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$name])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function getExercises($user, $date){
        $sql = "SELECT * FROM actividad WHERE idUser = ? AND fecha = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$user, $date])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function getExerciseById($id){
        $sql = "SELECT * FROM ejercicios WHERE idEjercicios = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$id])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function deleteExercise($idUser, $idEx, $date){
        $sql = "DELETE FROM actividad WHERE idUser = ? AND idActividad = ? AND  fecha = ?;";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$idUser, $idEx, $date])) {
                return true;
        }else{
                return false;
        }
    }

    public function deleteExerciseAdmin($id){
        $sql = "DELETE FROM ejercicios WHERE idEjercicios = ?;";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$id])) {
                return true;
        }else{
                return false;
        }
    }

    public function checkExerciseByName($name){
        $sql = "SELECT * FROM ejercicios WHERE nombre = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$name])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }
}
