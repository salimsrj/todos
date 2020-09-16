<?php
require('vendor/autoload.php');
$task = new Task;
$postData = json_decode(file_get_contents('php://input')); 
$taskID = $postData->id;
$taskID = (int)$taskID;
$taskTitle = $postData->title;

if(isset($taskID) && $taskID != ''){
    echo $task->updateTask($taskID, $taskTitle);
  }