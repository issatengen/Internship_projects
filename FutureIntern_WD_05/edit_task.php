<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Intern / Add task</title>
    <link rel="stylesheet" href="style.css">
    <?php
    $task_id=$_GET['task_id'];
    try{
        $bd=new PDO('mysql:host=localhost;dbname=todolist','root','');
    }
    catch(Exception $e){
        die('Error: '. $e->getmessage());
    }
    $call=$bd->prepare('SELECT * FROM task WHERE task_id=:task_id');
    $call->execute(array(
        'task_id'=> $task_id
    ));
    
    ?>
</head>
<body>
    <center>
        <h2 class="h1">
            Edit Task
        </h2>
        <div class="working-space">
            <form action="edit_this_task.php?taskID=<?php echo $task_id ?>" method="post">
                <fieldset>
                    <?php
                    while($this_task=$call->fetch()){

                    ?>
                    <legend>Fill the form</legend>
                    <div class="form-div">
                        <label for="task_name">Task Name</label>
                        <input type="text" name="task_name" value="<?php echo $this_task['task_name'] ?>"><br>
                    </div>
                    <div class="form-div">
                        <label for="task_description">Task description</label>
                        <textarea type="text" name="task_description" id="" >
                            <?php echo $this_task['task_description'] ?>
                        </textarea>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="form-div">
                        <button type="submit" class="submit-button">
                            Save
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </center>

    <!--Footer-->
    <center>
        <br><br><br><br><br>
        <div class="footer">
            © Copyright <b>2024</b> All right reserved <br>
            Design by <b>Tengen Issa</b> WD_03
        </div>
    </center>
</body>
</html>