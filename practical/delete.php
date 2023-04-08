<?php 
include 'config.php';
$ID = $_GET['id'];
$delquery = "DELETE FROM tasks WHERE Tid = '$ID' ";


if(mysqli_query($conn, $delquery)){
    echo "<script>alert('Data Deleted Successfully..')</script>";
    header("location: task.php?id=$ID");
} else{
    echo "<script>alert('Data Not Deleted Try Again..!')</script>";
}

if(isset($_GET['Tid'])){
    $TID = $_GET['Tid'];
    $delquery = "DELETE FROM tasks WHERE Tid = '$TID' ";
    
    
    if(mysqli_query($conn, $delquery)){
        echo "<script>alert('Data Deleted Successfully..')</script>";
        header("location: TaskTable.php");
    } else{
        echo "<script>alert('Data Not Deleted Try Again..!')</script>";
    }
}

?>