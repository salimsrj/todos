<?php
require('vendor/autoload.php');
$task = new Task;
$postData = json_decode(file_get_contents('php://input')); 
$updateTask = $postData->update_task[0];
$updateTask = $int = (int)$updateTask;
if(isset($updateTask) && $updateTask != ''){
    echo $task->completeTask($updateTask);
  }