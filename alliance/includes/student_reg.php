
<?php require_once 'head.php'?>

<?php
#import php file
require_once '../../admin/includes/pdo.php';

// if the vlue of the fields are true

if(isset($_POST['submit'])){
// sql connnection to insert into database



$tr = "img";
$trF = $tr.basename($_FILES['picture']['name']);
move_uploaded_file($_FILES['picture']['tmp_name'],$trF);
$s  =$_POST['gender'];
$c  =$_POST['class'];
$fn  =$_POST['fname'];
$ln  =$_POST['lname']; 
$NS  =$_POST['Nin_status'];
$h =$_POST['house'];
$bd =$_POST['date'];


$sql = 'insert into student (fname,lname,photo,gender,house,class, nin_status,Birthdate) values(:fn,:ln,:pt,:s,:h,:c,:NS,:bd)';
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':s'=>$s,
':c'=>$c,
':NS'=>$NS,
':h'=>$h,

':fn'=>$fn,
':ln'=>$ln,
':pt'=>$trF,
':bd'=>$bd

));

}

?>


<form class="" method="post"  enctype="multipart/form-data">
<div class="main-div-students">
          
     <div class="inputs">
            <input type="file" name="picture"  required="true" id="img">
         <input type="text"  required="true" name='fname' placeholder="First Name">
         <input type="text"  required="true" name='lname' placeholder="Last Name">
   <?php require 'date.php'?>
        <select name="gender" id="gender">
            <option value=" female">Select the gender</option>
            <option value=" female">female</option>
            <option value="male">male</option>
            <option value="other">other</option>

        </select>
        <select name="class" id="class">
            <option value=" default">Select the class</option>
            <option value="s1">s1</option>
            <option value="s2">s2</option>
            <option value="s4">s4</option>
            <option value="s4">s4</option>
            <option value="s5">s5</option>
            <option value="s6">s6</option>
        

        </select>
      <select name="Nin_status" id="nin_status">
            <option value=" default">Select  nin_status</option>
            <option value=" true">true</option>
            <option value="false">false</option>

        </select>
        <select name="house" id="house">
            <option value=" default">Select house </option>
            <option value=" joiners" selected>joiners</option>
            <option value=" lumubwa">lumubwa</option>
            <option value="venus">venus</option>
            
        </select>

         
         <button class="button" type="submit"  name="submit">Register</button>
         
         
         
        </div>
    </div>
</div>

</form>
<?php 
require_once 'footer.php';
?>