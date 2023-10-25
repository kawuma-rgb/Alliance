<?php
require_once '../../admin/includes/pdo.php';
if($_POST["delete"]){
    $id = $_POST["lin_number"];
    echo $id;

    // $delete = $pdo->prepare( ' Delete from students where lin_number = 1 ');
    // $delete->execute();
    // header("Location: student.php");
    // exit();
} 
?>