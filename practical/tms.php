<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="">
        <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Averia+Serif+Libre:ital,wght@0,300;1,300;1,700&family=DM+Serif+Display:ital@1&family=Petit+Formal+Script&family=Tilt+Prism&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-2">
            <h1 class="text-center  bg-info">welcome to task management system </h1><br>
                <h3 class="text-center" style="font-family: 'Alkatra', cursive";
                >
                Hello  <?php echo  $_SESSION['user'] ?>..!
            </h3> 
        </div><br><br>
        <div class="container">
            <form class="d-flex" action="tms.php" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="find">Search</button>
            </form>
            <?php
        if(isset($_POST['find'])){
          $search=$_POST['search'];
          $find="SELECT * FROM tasks WHERE userID LIKE '%$search%' or `name` LIKE '%$search%'   ";
          $go=mysqli_query($conn,$find);
          
          if($go){
            if(mysqli_num_rows($go)> 0){
         ?>
         <br>
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Task NAME</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                    
            <?php while($row=mysqli_fetch_assoc($go)) {

             ?>
                  <tr>
                    <td><?php echo $row['userID']?> </td> 
                    <td><?php echo $row['name']?> </td>
                    <td><?php echo $row['status']?> </td>
                    <td><button class="btn btn-success">
                        <a href="task.php?id=<?php echo $row['userID'] ?>" class="text-white text-decoration-none">Detail
                        </a></button></td>
                  </tr>
                </tbody>
              </table>
              <?php
                }   

            }
            
        }else{
            ?>
            <tr>
                    <th scope="row"></th>
                    <td>no recored found</td>
                    
                  </tr>
                  <?php
        }
        
        
    }
    ?>
        </div><br><br><br>
        
        <form action="logout.php" class="text-center" method="post">
            <button type="submit" class="btn btn-dark" name="logout" >logout</button>
        </form>
      

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>