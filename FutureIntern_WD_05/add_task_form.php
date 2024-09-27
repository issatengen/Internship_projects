<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Intern / Add task</title>
    <link rel="stylesheet" href="style.css">
    <?php
    date_default_timezone_set('Africa/Douala');
    try{
        $bd=new PDO('mysql:host=localhost;dbname=todolist','root','');
    }
    catch(Exception $e){
        die('Error: '. $e->getmessage());
    }
    if(isset($_POST['task_name']) and isset($_POST['task_description'])){
        $task_name=$_POST['task_name'];
        $task_description=$_POST['task_description'];
        $date_added=date('Y-m-d');
        $time_added=date('H:i:s');
        $add=$bd->prepare('INSERT INTO task(task_name,task_description,date_added,time_added) 
        VALUES(:task_name,:task_description,:date_added,:time_added)');
        $add->execute(array(
            'task_name'=> $task_name,
            'task_description'=> $task_description,
            'date_added'=> $date_added,
            'time_added'=> $time_added
        ));
        if($add){
            header('location:todolist.php?status=The task was added successfully');
        }
    }
    ?>
</head>
<body>
    <center>
        <h2 class="h1">
            Add Task
        </h2>
        <div class="working-space">
            <form action="add_task_form.php" method="post">
                <fieldset>
                    <legend>Fill the form</legend>
                    <div class="form-div">
                        <label for="task_name">Task Name</label>
                        <input type="text" name="task_name"><br>
                    </div>
                    <div class="form-div">
                        <label for="task_description">Task description</label>
                        <textarea name="task_description" id=""></textarea>
                    </div>
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
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>
