<?php
include('config.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <title></title>
</head>
<body>
<?php

$Tid = $_GET['Tid'];
$getdata = "SELECT * FROM `tasks` WHERE `tasks`.`Tid` = '$Tid'";

$res = mysqli_query($conn, $getdata);

if($res){
    $row =  mysqli_fetch_assoc($res);

    $TaskName = $row['name'] ;
    $description = $row['description'];
    $DueDate = $row['due_date'];
}


?>
<div id="login">
        <!-- <h3 class="text-center text-dark ">ADD TASK</h3> -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="update2.php" method="post">
                            <h3 class="text-center text-info">UPDATE YOUR TASK</h3>
                            <p style="color:red;font-size:small;" class="text-bold"  >
                          <div class="form-group">
                                <input type="hidden" name="Tid" id="UserID" class="form-control" value="<?php echo $Tid ?>">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">TASK NAME</label><br>
                                <input type="text" name="TaskName" id="username" class="form-control" value="<?php echo $TaskName ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">DESCRIPTION</label><br>
                                <input type="text" name="description" id="password" class="form-control" value="<?php echo $description ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="text-info">DUE DATE</label><br>
                                <input type="date" name="DueDate" id="password" class="form-control" value="<?php echo $DueDate ?>" required>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="Update" class="btn btn-info btn-md" value="Update Task">
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php

if (isset($_POST['Update'])) {
    $Tid = $_POST['Tid'];
    $name =  $_POST['TaskName'];
    $description =  $_POST['description'];
    $date =  $_POST['DueDate'];
    $update = "UPDATE tasks SET `name` = '$name' , `description` ='$description' , 
               `due_date` = '$date' WHERE Tid = '$Tid'";
    $updateRes = mysqli_query($conn, $update);
    if ($updateRes) {
        echo"<script>alert('Record Updated!')</script>";
        echo "<script>window.location.href='TaskTable.php';</script>";
    } else {
        echo"<script>alert('Updation Failed!')</script>";
        echo "<script>window.location.href='update2.php';</script>";
    }
}



?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>