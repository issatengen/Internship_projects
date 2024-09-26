<?php
    date_default_timezone_set('Africa/Douala');
    $taskID=$_GET['taskID'];   
    try{
        $bd=new PDO('mysql:host=localhost;dbname=todolist','root','');
    }
    catch(Exception $e){
        die('Error: '. $e->getmessage());
    }
    if(isset($_POST['task_name']) and isset($_POST['task_description'])){
        $task_name=$_POST['task_name'];
        $task_description=$_POST['task_description'];
        $accomplished=$bd->prepare('UPDATE task SET task_name=:task_name,task_description=:task_description WHERE task_id=:task_id');
        $accomplished->execute(array(
            'task_name'=> $task_name,
            'task_description'=> $task_description,
            'task_id'=> $taskID
        ));
        var_dump($accomplished);
        if($accomplished){
            header('location:todolist.php?status=The task was Edited successfully');
        }
    }
?>