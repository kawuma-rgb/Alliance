<?php require_once 'head.php';

require_once '../../admin/includes/pdo.php';
if(isset($_POST['delete'])){
   
    $sql = 'delete from students where lin_number = :n';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':n'=>$_POST['lin_number']));
}



?>

<table class="table-view">
    <?php
require_once '../../admin/includes/pdo.php';


    $sql = "select * from student ";
    $stmt = $pdo->query($sql);

    // echo 'rude';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr><td class="imgg"> <img src="' . $row['photo'] .'"alt="no image"></td>';
        echo '<td class="lin">' . $row['lin_number'] . '</td>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['lname'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';

        echo '<td>' . $row['class'] . '</td>';
        echo '<td>' . $row['house'] . '</td>';
        echo '<td>' . $row['DateCreated'] . '</td><td>';

        echo ('<form method="POST" ><input type="hidden"');
        echo ('name="lin_number" value="' . $row['lin_number'] . '">' . "\n");
?>
<input type="submit" value="delete" id="delete" name="delete" onclick=" return confirm('Do You Want To Delete <?php  echo $row['fname']. '  '.$row['lname'] ?>? Click Ok To Continue  and Cancel to cancel the operation' )">

<?php
        echo ("</form> </td>");
        echo ('<td><form method="POST" ><input type="hidden"');
        echo ('name="lin_number" value="' . $row['lin_number'] . '">' );

        ?>
<a href="update_student.php?id=<?php echo $row["lin_number"] ?> "name="sumbit" id="update">update</a>
        <?php
        echo ("</form> </td>");


        echo ('</tr>');
    }
    ?>

</table>




<?php require_once 'footer.php' ?>