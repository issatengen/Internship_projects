<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Intern / TodoList</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <?php
    try{
        date_default_timezone_set('Africa/Douala');
        $bd=new PDO('mysql:host=localhost;dbname=todolist','root','');
    }
    catch(Exception $e){
        die('Error: '. $e->getmessage());
    }
    $list=$bd->query('SELECT * FROM task WHERE date_accomplished IS NULL');
    ?>
</head>
<body>
    <center>
        <h2 class="h1">Future Inter Todo List</h2>
    </center>
        <a href="add_task_form.php" style=" marging-left:90%">
            <button class="add-task-button">
                Add task
                <i class="bi bi-plus-circle"></i>
            </button>
        </a>
        <a href="accomplished_task.php" style=" marging-left:90%">
            <button class="list-task-button">
                Accomplished tasks
                <i class="bi bi-ui-checks"></i>
            </button>
        </a>
    <center>
        <table>
            <thead>
                <tr>
                    <th>Task name</th>
                    <th>Date added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($this_list=$list->fetch()){
                    $currentTime = new DateTime();
                    $timeAdded = new DateTime($this_list['time_added']);
                    $interval = $currentTime->diff($timeAdded);
                    $diffHour=($interval->days * 24) + $interval->h;
                    $diffMin = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                    $diffSec=($interval->days * 24 * 60 * 60) + ($interval-> h * 60 * 60) + ($interval->i * 60) + $interval->s;

                    // Calculate and ajust time
                    while($diffSec >= 59){
                        $diffSec -=  60;
                        $diffMin++;
                    }
                    while($diffMin >= 59){
                        $diffMin -= 60;
                    }
                ?>
                <tr>
                    <td>
                        <span class="added">Added <?php echo '<b>'. $diffHour.'H : '. $diffMin.'Min' ?>  </b> ago</span><br><br>
                        <span class="task-description"><?php echo $this_list['task_description']?></span><br>
                        ▶ <?php echo '<b>'.$this_list['task_name'].'</b>'?>
                    </td>
                    <td>
                        <?php echo $this_list['date_added']."  ". $this_list['time_added'] ?>
                    </td>
                    <td>
                        <a href="add_accomplished_task.php?task_id=<?php echo $this_list['task_id'] ?>">
                            <button class="done-list">
                                Done
                                <i class="bi bi-check2-circle"></i>
                            </button>
                        </a>
                        <a href="edit_task.php?task_id=<?php echo $this_list['task_id'] ?>">
                            <button class="edit-list">
                                Edit
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                        </a>
                        <a href="delete_task.php?task_id=<?php echo $this_list['task_id'] ?>">
                            <button class="delete-list">
                                Delete
                                <i class="bi bi-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
                }
                
                ?>
            </tbody>
        </table>
    </center>

    <!--Footer-->
    <!--Footer-->
    <?php
    include_once 'footer.php';
    ?>
    <script>
        let parameters=new URLSearchParams(window.location.search);
        let status=parameters.get('status');
        if(status){
        alert(status);
        }else{
        exit;
        }
    </script>
    
</body>
</html>
