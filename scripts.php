<?php
//INCLUDE DATABASE FILE
include('database.php');


//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//ROUTING
if (isset($_POST['save']))        saveTask();
if (isset($_POST['update']))      updateTask();
if (isset($_POST['delete']))      deleteTask();

// $array = array(
//     'color' => 'green',
//      'text' => 'wow'
//         );

//         if(isset($_SESSION['message']))
//         {
//             $array = array(
//                 'color' => 'green',
//                  'text' => 'wow'
//                     );
//                     $_SESSION['message'] = $array; 

//         }
      
    

function getTasks($var)
{
    //CODE HERE
    global $conn;
    $request   = "SELECT * FROM `tasks`  WHERE   tasks.status_id = $var";



    //$request2  = "";
    //SQL SELECT
    $res = mysqli_query($conn, $request);

    while ($row = mysqli_fetch_assoc($res)) {
        $Title = $row["title"];
        global $id;
        $id = $row["taskID"];
        $var2 = $row["type_id"];
        $request1  = "SELECT  name FROM `types` WHERE types.type_id = $var2";
        $res1 = mysqli_query($conn, $request1);
        while ($type_id =  mysqli_fetch_assoc($res1)) {
            $type_id1 = $type_id["name"];
        }
        $var3 = $row["priority_id"];
        $request2 = "SELECT name  FROM `proprieties` WHERE  proprieties.id_propreties = $var3";
        $res3 = mysqli_query($conn, $request2);
        while ($priority_id =  mysqli_fetch_assoc($res3)) {
            $priority = $priority_id["name"];
        }
        $status = $row["status_id"];
        if ($status == 1) {
            $iconStr = 'bi bi-hourglass-split fs-3 text-success';
          } else if ($status == 2) {
            $iconStr = 'bi bi-question-circle fs-3 text-success';
          } else if ($status == 3) {
            $iconStr = 'bi bi-check-circle-fill fs-3 text-success';
          }
        $date = $row["task_datetime"];
        $description = $row["description"];
        echo "<button id='btn'  href='#modal-task' data-bs-toggle='modal'  class=' p-2 w-100 d-flex border-0  bg-white md border-bottom' onclick='fillMyForm({$id})'>
                <div class='px-3'>
                <i class='{$iconStr}' id='icone'></i>
                </div>
                <div class='text-start'>
                    <div data-stat='{$status}' id ='{$id}status'></div>
                    <div class='h5' data-btn='{$Title}' value='{$Title}' id ='{$id}hello'>{$Title}</div>
                    <div class='text-start'>
                        <div id='{$id}date' data-btn ='{$date}' class='h6'># $id created in $date</div>
                        <div class='description' data-description='{$description}' id='{$id}description' >$description</div>
                    </div>
                    <div class='text-start'>
                        <span data-type = {$var2}  id='{$id}type' class='btn btn-primary'>$type_id1 </span>
                        <span data-priority={$var3} id='{$id}priority' class='btn btn-light text-black'>$priority</span>
                    </div>
                </div>
            </button>";
    }
}



function saveTask()
{
    global $conn;
    if(check($_POST['title']) == true || check($_POST['Description']) == true)
    {
    $title = $_POST['title'];
    $type = $_POST['task-type'];
    $priorities = $_POST['priorities'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $description = $_POST['Description'];
    $sql = "INSERT INTO `tasks`(`title`, `type_id`, `priority_id`, `status_id`, `task_datetime`, `description`) VALUES ('$title',' $type','$priorities','$status','$date','$description')";
    mysqli_query($conn, $sql);
    $_SESSION['message'] ['text']= "Task has been added successfully !";
     $_SESSION['message']['color'] = "green";
    }
    else
    {
        $_SESSION['message']['text'] = "please fill the form!";
        $_SESSION['message']['color'] = "purple";
    }

    

    //SQL INSERT
   
    header('location: index.php');

}


function check($data)
{
    if(preg_match('/.{1,}/',$data))
    {   
        return true;
    }
    else
    return false;
}
  

    function updateTask()
{
    //CODE HERE
    global $conn;
    $id = $_POST['name-task-id'];
    $title = $_POST['title'];
    $type = $_POST['task-type'];
    $priorities = $_POST['priorities'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $description = $_POST['Description'];
    $sqli = "UPDATE `tasks` 
    SET title = '$title', type_id='$type',priority_id ='$priorities' ,status_id= '$status', task_datetime ='$date', description = '$description' 
     WHERE  taskID = '$id'";
    mysqli_query($conn, $sqli);

    //SQL UPDATE
    $_SESSION['message']['text'] = "Task has been updated successfully !";
    $_SESSION['message']['color'] = "blue";
    header('location: index.php');
}

function deleteTask()
{
    //CODE HERE
    global $conn;
    $id = $_POST['name-task-id'];
    $sqli_delete = "DELETE FROM `tasks` WHERE taskID = '$id'";
    mysqli_query($conn, $sqli_delete);
    //SQL DELETE
    $_SESSION['message']['text'] = "Task has been deleted successfully !";
    $_SESSION['message']['color'] = "red";
    header('location: index.php');
}

