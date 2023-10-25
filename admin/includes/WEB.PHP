<?php
    require_once 'pdo.php';
    if($_POST['delete']){
        echo($_POST['lin_number']);
        $sql = 'delete from students where lin_number = :n';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':n'=>$_POST['lin_number']));
}
 
?>



<table>


    <?php
    require_once './pdo.php';
    

    $sql = "select fname, lname, class,house,Nationality,lin_number from students ";
    $stmt = $pdo->query($sql);

    echo 'rude';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr><td>' . $row['lin_number'] . '</td>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['lname'] . '</td>';

        echo '<td>' . $row['class'] . '</td>';
        echo '<td>' . $row['house'] . '</td>';
        echo '<td>' . $row['Nationality'] . '</td><td>';

        echo ('<form method="POST" ><input type="hidden"');
        echo ('name="lin_number" value="' . $row['lin_number'] . '">' . "\n");
        echo ('<input type="submit" value="del" name="delete">');
        echo ("\n</form>\n");

        echo ('</td></tr>\n');
    }



    ?>

</table>