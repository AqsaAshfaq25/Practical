<?php
include('config.php');
session_start();
if(isset($_POST['ADD'])){
    $userID = $_POST["UserID"];
    $TaskName=$_POST['TaskName'] ;
    $description=$_POST['description'];
    $DueDate=$_POST['DueDate'];
    $query="INSERT INTO `tasks`(`name`, `description`, `due_date`) VALUES ('[$TaskName]','[$description]','[$DueDate]')";
    $data=mysqli_query($conn,$query);
    $NameCount = mysqli_num_rows($data);
    if($NameCount>0){
        $error="Name Already Exists";
        echo "<script>alert('Task Is Not Inserted..!')</script>";
        echo "<script>window.location.href='form.php'</script>";
    }
    else{
        echo "<script>alert('Task Inserted successful')</script>";
        echo "<script>window.location.href = 'task.php';</script>";
    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div id="login">
        <!-- <h3 class="text-center text-dark ">ADD TASK</h3> -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="form.php" method="post">
                            <h3 class="text-center text-info">ADD NEW TASK</h3>
                            <p style="color:red;font-size:small;" class="text-bold"  >
                          <?php           
                               if(isset($error)){
                                  echo $error;
                               }           
                          
                          ?>
                          </p>
                          <?php
                          if (isset($_GET['id'])) {
                            $id= $_GET['id'];
                            $query = "SELECT * FROM users where userID = '$id'";
                             $data = mysqli_query($conn, $query);

                             $row = mysqli_fetch_array($data);

                             if ($row) {

                            
                          
                          ?>
                          <div class="form-group">
                                <input type="hidden" name="UserID" id="UserID" class="form-control" value="<?php echo $row["userID"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">TASK NAME</label><br>
                                <input type="text" name="TaskName" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">DESCRIPTION</label><br>
                                <input type="text" name="description" id="password" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="text-info">DUE DATE</label><br>
                                <input type="date" name="DueDate" id="password" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="ADD" class="btn btn-info btn-md" value="Add Task">
                            </div>
                        </form>
                        <?php
                           }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>