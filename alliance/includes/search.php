<?php
require_once '../../admin/includes/pdo.php';

if(!empty($_POST['search']['value'])){
    $sql .= 'select * from  students where fname like "%'. $_POST['search']['value'].'%" ';
    $sql .= 'OR lname like  "%'. $_POST['search']['value'].'%" ';
    $sql .= 'OR teacher_id like  "%'. $_POST['search']['value'].'%" ';
    $sql .= 'OR  initials like "%'. $_POST['search']['value'].'%" ';
     
}
?>
<form action="" method="post">
    <input type="search" name="search">
    <!-- <input type="submit" name="submit"> -->
</form>

<?php

?>