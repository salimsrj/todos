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

    public function completeTask($updateTask){
        $pdo = new DbCon();
        $conn = $pdo->open();
        $stmt= $conn->prepare("UPDATE tasks SET status=:status WHERE id=:id");
        $update = $stmt->execute(['status'=> 1, 'id'=>$updateTask]);
        $pdo->close();
        return $updateTask;        
    }

}