<?php
require_once 'head.php';
#import php file
require_once '../../admin/includes/pdo.php';
$table = 'teacher';
// if the vlue of the fields are true

if(isset($_POST['submit'])){
// sql connnection to insert into database

$sN=$_POST['subject_Name'];
$sql = 'insert into subjects (subject_Name) values(:sN)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
':sN'=>$sN]
);
header("Loaction:subjects.php");
}
?>


<form  method="post">
<div class="main-div-subject">
       
        <input type="text"  required="true" name='subject_Name' placeholder="Subject Name">
        <button class="button" type="submit" name="submit">Register</button>

        

    </div>

</form>
<?php require_once 'footer.php';?>