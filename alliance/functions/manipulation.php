<?php 

if($_POST["delete"]){
    $delete =$pdo->prepare( "Delete from students where Lin_number ='.$_POST["Lin_number"].'");
    $delete->execute();
    header("Location: student.php");
    exit();
}



if(isset($_POST['update'])){
    $id = $_POST['id'];
    
}
?>