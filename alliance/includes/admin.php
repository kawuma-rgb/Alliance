<?php
#import php file
require_once 'head.php';
require_once '../../admin/includes/pdo.php';
$table = 'teacher';
// if the vlue of the fields are true

if(isset($_POST['submit'])){
// sql connnection to insert into database

$N=$_POST['name'];
$ad=$_POST['admin_password'];
$sql = 'insert into admin(passwrd,username) values(:N,:ad)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':ad'=>$ad,
    ':N'=>$N
]);
header("Loaction:admin.php");
}
?>


<form  method="post">
<div class="main-div-admin">
<div class="admin_photo">
            <img src="./pexels-andrea-piacquadio-927451.jpg" id="profile_pic" alt="">
            <input type="file" name="file" id="file">
            <label id="profile_pic_button" class="button" for="file">import Image</label>
        </div>
       
        <input type="text" required="true" name='name' placeholder="user Name">
        <input type="password" required="true" name='admin_password' placeholder="admin password">
   
    
              
         <button class="button" type="submit" name="submit">Register</button>
        
        

    </div>

</form>
<?php require_once 'footer.php';?>