<?php
try{
    $bd=new PDO('mysql:host=localhost;dbname=todolist','root','');
}
catch(Exception $e){
    die('Error: '. $e->getmessage());
}
$task_id=$_GET['task_id'];
$delete=$bd->prepare('DELETE FROM task WHERE task_id=:task_id');
$delete->execute(array(
    'task_id'=> $task_id
));
if($delete){
    header('location:todolist.php?status=The task was deleted successfully');
}
?>