<?php
class ClearCompleteList
{
    public function __construct()
    {
        echo $this->taskList();
    }
    public function taskList()
    {
        $pdo = new DbCon();
        $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT *  FROM tasks  WHERE status=1");
        $taskList = $stmt->execute();
        $taskList = $stmt->fetchAll();



        $ids = array();
        foreach ($taskList as $task) {
        $taskId = $task['id'];
        $ids[] = (int)$taskId;
        }
        $ids = implode(',',$ids);

        $query = $conn->prepare("DELETE FROM tasks WHERE id IN ( $ids )");
        $query->execute();



        $stmt = $conn->prepare("SELECT *  FROM tasks");
        $taskList2 = $stmt->execute();
        $taskList2 = $stmt->fetchAll();



        $pdo->close();

        $taskArray = array();
        $i = 0;
        foreach ($taskList2 as $task) {
            $taskArray[$i] = array(
                'id' => $task['id'],
                'title' => $task['title'],
                'status' => $task['status'],
                'edit' => false,
            );
            $i++;
        }
        return json_encode($taskArray);
        

    }
}
