<?php
require('vendor/autoload.php');
$task = new Task;
$postData = json_decode(file_get_contents('php://input')); 
$delID = $postData->id;
if(isset($delID) && $delID != ''){
  echo $task->delete($delID);
}