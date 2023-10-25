<?php require_once 'head.php' ;?>
<style>

</style>




<?php
require_once '../../admin/includes/pdo.php';
if(isset($_POST['delete'])){
   
    $sql = 'delete from teacher where teacher_id = :n';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':n'=>$_POST['teacher_id']));
}


?>
<?php
require_once '../../admin/includes/pdo.php';




?>

<table class="table-view">
    <thead>
        <tr >

            <th style="text-align: left; padding-left:25px;" >Image</th>
            <th style="text-align: left; padding:12px;">First name</th>
            <th style="text-align: left; padding:12px;">Last name</th>
            <th style="text-align: left; padding:12px;">Intials</th>
            <th style="text-align: left; padding:12px;">Gender</th>
            <th style="text-align: left; padding:12px;">Location</th>
            <th style="text-align: left; padding:12px;">Phone</th>
            <th style="text-align: center; margin-left:45px;">Actions</th>
        </tr>
    </thead>

    <?php


    $sql = "select * from teacher ";
    $stmt = $pdo->query($sql);

    // echo 'rude';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        
        echo '<td style=" width:80px" > <img src="' . $row['photo'] . '" id="photo"></td>';
        echo '<td>' . $row['fname'] . '</td>';
        // echo '<td>' . $row['teacher_id'] . '</td>';

        echo '<td>' . $row['lname'] . '</td>';
        echo '<td>' . $row['intials'] . '</td>';
        echo '<td>' . $row['Gender'] . '</td>';
        echo '<td>' . $row['location'] . '</td>';
        echo '<td>' . $row['Phone_no'] . '</td><td>';

        echo ('<form method="POST" ><input type="hidden"');
        echo ('name="teacher_id" value="' . $row['teacher_id'] . '">' . "\n");
        ?>

    <input type="submit" value="delete" id="delete"  onclick=" return confirm('Do you want to delete <?php echo $row['fname']. '  '.$row['lname'];?> click yes if You Want to continue and click no to cancel')" name="delete">
        <?php
        echo ("</form> </td>");
        echo ('<td><form method="POST" ><input type="hidden"');
        echo ('name="teacher_id" value="' . $row['teacher_id'] . '">' . "\n");
        // echo ('<input type="submit" value="update" class="update" name="update">');
        ?>
<a href="update.php?id=<?php echo $row["teacher_id"] ?> "name="sumbit" id="update">update</a>

        <?php
        echo ("</form> </td>");
        echo ('</tr>');;
    endwhile;




    ?>
<!-- <button></button> -->


</table>


<script>
    
// function comfirmDelete(self){
// var id = self.getAttribute("data-id");
// document.getElementById("form-delete").id.value = id;
// $("#deleteModel").modal('show');
// }

</script>

<?php require_once 'footer.php' ?>