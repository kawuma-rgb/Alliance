<?php
require_once "head.php";
require_once '../../admin/includes/pdo.php';
if(isset ($_POST['submit'])){

    $sub = $_POST['subject'];
    $stu = $_POST['student'];
    $act1= $_POST['ac1'];
    $act2 = $_POST['ac2'];
    $act3= $_POST['ac3'];
    $act4= $_POST['ac4'];
    $act5 = $_POST['ac5'];
    if(!isset($_POST['act1']))$_POST['act1'] = 0;else $_POST['act1'];
    if(!isset($_POST['act2']))$_POST['act2'] = 0;else $_POST['act2'];
    if(!isset($_POST['act3']))$_POST['act3'] = 0;else $_POST['act3'];
    if(!isset($_POST['act4']))$_POST['act4'] = 0;else $_POST['act4'];
    if(!isset($_POST['act5']))$_POST['act5'] = 0;else $_POST['act5'];
    $sql = "insert into marks (student,subject,activity1,activity2,activity3,activity4,activity5) values(:stu,:sub,:ac1,:ac2,:ac3,:ac4,:ac5)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':sub'=>$sub,
        ':stu'=>$stu,
        ':ac1'=>$act1,
        ':ac2'=>$act2,
        ':ac3'=>$act3,
        ':ac4'=>$act4,
        ':ac5'=>$act5
    ));
}

?>
<form action="" method="post">
<div class="main-div-teacher">

<input type="text" name="subject" placeholder="subject_name" required="true">
<input type="text" name="student" placeholder="student" required="true">
<input type="number" name="ac1" id="" <?php ?> >
<input type="number" name="ac2" id="">
<input type="number" name="ac3" id="">
<input type="number" name="ac4" id="">
<input type="number" name="ac5" id="">
<input type="submit" value="submit" class="button" name="submit" >
</div>
</form>