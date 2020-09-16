<?php
class Task{
    public function create($newTask){
        
        $pdo = new DbCon();
        $conn = $pdo->open();
        
        $stmt = $conn->prepare("INSERT INTO  tasks(title) VALUES (:title)");
        $stmt->execute(['title'=>$newTask]);
        $taskID = $conn->lastInsertId();
        $pdo->close();
        return $taskID;
    }

    public function taskList(){
        echo 'tasklist';
    }
}