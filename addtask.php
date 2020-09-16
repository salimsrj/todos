<?php
require('vendor/autoload.php');
$task = new Task;
$postData = json_decode(file_get_contents('php://input')); 
$newTask = $postData->new_task;
if(isset($newTask)){
  echo $task->create($newTask);
}
