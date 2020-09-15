<?php
class taskList
{
    public function __construct()
    {
        echo $this->taskList();
    }
    public function taskList()
    {
        $pdo = new DbCon();
        $conn = $pdo->open();
        $stmt = $conn->prepare("SELECT *  FROM tasks");
        $taskList = $stmt->execute();
        $taskList = $stmt->fetchAll();
        $pdo->close();

        $taskArray = array();
        $i = 0;
        foreach ($taskList as $task) {
            $taskArray[$i] = array(
                'id' => $task['id'],
                'title' => $task['title'],
                'edit' => false,
            );
            $i++;
        }
        return json_encode($taskArray);

    }
}
