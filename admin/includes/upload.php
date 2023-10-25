<?php
require_once "../../admin/includes/pdo.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form method="POST">
    <?php
  echo 'delete';
    // require_once '../../admin/includes/pdo.php';
    $sql = 'SELECT * FROM students ';
    // $stmt = $pdo->prepare($sql);
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll();


    echo '<table>';
    foreach ($data as $row) {

      echo '<tr>';
      echo '<td>' . $row['lin_number'] . '</td>';
      echo '<td>' . $row['fname'] . '</td>';
      echo '<td>' . $row['lname'] . '</td>';
      echo '<td>' . $row['photo'] . '</td>';
      echo '<td>' . $row['sex'] . '</td>';
      echo '<td>' . $row['class'] . '</td>';
      echo '<td>' . $row['nin_status'] . '</td>';
      echo '<td>' . $row['Nationality'] . '</td>';
      echo '<td>' . $row['house'] . '</td>';
      echo '<td>' . '<button id=' . $row['fname'] . ' class = "delete" name="edit" > <a href="../functions/edit.php"> edit</a></button>' . '</td>';

      echo '<td>' . '<button id=' . $row['fname'] . ' name="delete" >  delete</button>' . '</td>';
      // echo '<td>'.$row[''].'</td>';
      echo '</tr>';
    }
    echo '</table>';
    ?>
  </form>

</body>

</html>