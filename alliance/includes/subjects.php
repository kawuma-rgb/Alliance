<?php require_once 'head.php' ;

require_once '../../admin/includes/pdo.php';
if(isset($_POST['delete'])){
    echo($_POST['subject_id']);
    $sql = 'delete from subjects where subject_id = :n';
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':n'=>$_POST['subject_id']));
}
?>


<table class="table-view" style="width:20%;">


    <?php


    $sql = "select subject_Name,subject_id from subjects ";
    $stmt = $pdo->query($sql);

    // echo 'rude';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      

      
        echo '<td>' . $row['subject_Name'] . '</td><td>';

        echo ('<form method="POST" ><input type="hidden"');
        echo ('name="subject_id" value="' . $row['subject_id'] . '">' );
        echo ('<input type="submit" value="delete" id="delete" name="delete">');
        echo ("</form></td>");
        // echo '<td> <a id="update_subject" type="submit" value="update" name="update"></td>';

        echo ('</tr>');



    }



    ?>
<!-- <button></button> -->



</table>
<form action="" method="post" class="hidden model">
<input type="text" name="" value="">
<input type="text" name="fname" value="">
<input type="submit" name="model" value="submit">
</form>
<?php require_once 'footer.php' ?>