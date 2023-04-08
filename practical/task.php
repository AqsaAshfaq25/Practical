<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Averia+Serif+Libre:ital,wght@0,300;1,300;1,700&family=DM+Serif+Display:ital@1&family=Petit+Formal+Script&family=Tilt+Prism&display=swap" rel="stylesheet">
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-2"><br><br>
<h1 class="text-center  bg-warning">YOUR TASK LIST </h1><br><br>


<form action="form.php" class="text-center d-flex" method="post">
    
</form><br><br>
<?php
        include "config.php";
            $id = $_GET['id'];
            $fetch = "SELECT * FROM tasks WHERE userID='$id'";
            $res = mysqli_query($conn, $fetch);


        ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TASK NAME</th>
                        <th>DESCRIPTION</th>
                        <th>DUE DATE</th>
                        <th>STATUS</th>
                        <th>OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($res)) {  ?>
                        <tr>
                            <td><?php echo $row["userID"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td><?php echo $row["due_date"] ?></td>
                            <td><?php if($row["status"]==0){

echo "incomplete";

                            }else{

                                echo "complete";
                            }  ?></td>
                            <td><button class="btn btn-primary">
                                    <a href="update.php?id=<?php echo $row["userID"] ?>" class="text-white text-decoration-none"> Update
                                    </a></button>
                                <button class="btn btn-danger">
                                    <a href="delete.php?id=<?php echo $row["userID"] ?>" class="text-white text-decoration-none"> Delete</a>
                                </button>
                                <button type="submit" class="btn btn-success" name="logout" >
                                    <a href="form.php?id=<?php echo $row["userID"]?>" class="text-white text-decoration-none">ADD TASK</a>
                                </button>
                            </td>
                            <td></td>

                        </tr>
                    <?php       }    ?>
                </tbody>
            </table>
<br><br>
        <form action="logout.php" class="text-center" method="post">
            <button type="submit" class="btn btn-dark" name="logout" >logout</button>
        </form>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>