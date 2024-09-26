<?php
try{
    $bd=new PDO('mysql:host=localhost;dbname=todolist','root','');
}
catch(Exception $e){
    die('Error: '. $e->getmessage());
}
$date=date('Y-m-d H:i:s');
$task_id=$_GET['task_id'];
$accomplished=$bd->prepare('UPDATE task SET date_accomplished=:date_accomplished WHERE task_id=:task_id');
$accomplished->execute(array(
    'date_accomplished'=> $date,
    'task_id'=> $task_id
));
if($accomplished){
    header('location:todolist.php?status=The accomplished task was registered successfully');
}
?>