<?php
require_once 'pdo.php';
$sql = 'SELECT * FROM students ';

// $stmt = $pdo->prepare($sql);
$stmt=$pdo->query($sql);
$data = $stmt->fetchAll();
echo '<table>';
foreach ($data as $row) {
    
echo '<tr>';
echo '<td>'.$row['lin_number'].'</td>';
echo '<td>'.$row['fname'].'</td>';
echo '<td>'.$row['fname'].'</td>';
    echo '</tr>';
}
echo '</table>';
?>