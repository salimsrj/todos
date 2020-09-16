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


    public function updateTask($id, $title){
        $pdo = new DbCon();
        $conn = $pdo->open();
        $stmt= $conn->prepare("UPDATE tasks SET title=:title WHERE id=:id");
        $update = $stmt->execute(['title'=> $title, 'id'=>$id]);
        $pdo->close();
        return $id; 
    }

}