<?php
require_once 'pdo.php';
$sql = "insert into students (lin_number,fname,lname,photo,sex,class,nin_status,nationality,house)value(:lin_number,:fname,:lname,:photo,:sex,:class,:nin_status,:nationality,:house)";








// if(!empty($_FILES["image"]["name"])){
//     $fileName = basename($_FILES["name"]["name"]);
//     $fileType = pathinfo($fileName,PATH_INFO_EXTENSION);
//     $allowType  = array('jpg','png','jpeg','gif');
//     if(in_array($fileType,$allowType)){(
//         $image = $_FILES['image']['tmp_name'];
//         $imgContent = addslashes(file_get_contents($image));
//     )}
// }





if(!empty($_FILES["image"]["name"])){
    $fileName = basename($_FILES["name"]["name"]);
    $fileType = pathinfo($fileName,PATH_INFO_EXTENSION);
    $allowType  = array('jpg','png','jpeg','gif');
    if(in_array($fileType,$allowType)){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
$sql = "insert into students (lin_number,fname,lname,photo,sex,class,nin_status,nationality,house)value(:lin_number,:fname,:lname,:photo,:sex,:class,:nin_status,:nationality,:house)";
    
        $stmt =$pdo->prepare($sql);
        $stmt->execute([
            ":lin_number"=>0002,
            ":fname"=>"kyle2",
            ":lname"=>"jordan2",
            ":photo"=>" $imgContent",
            ":sex"=>"f",
            ":class"=>"s3",
            ":nin_status"=>true,
            ":nationality"=>"ugandan",
            ":house"=>"lubwama"]);
            
    }
    if($stmt->query == true){
        echo 'suces';
    }}



// $stmt =$pdo->prepare($sql);
// $stmt->execute([
//     ":lin_number"=>0002,
//     ":fname"=>"kyl",
//     ":lname"=>"jorda",
//     ":photo"=>"../alliance/assets/imgs/gr.png",
//     ":sex"=>"f",
//     ":class"=>"s3",
//     ":nin_status"=>true,
//     ":nationality"=>"ugandan",
//     ":house"=>"lubwama"]);

// $sql = "select * from students ";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// while($row = $stmt->fetchAll() ){
//     foreach ($row as $key => $value) {
//         <th><h4> Exam-name</h4></th>
//         <th><h4> Subject</h4></th>
//         <th><h4> Grade</h4></th>
//         <th><h4> Percentage</h4></th>
//         <th><h4> Teacher</h4></th>

//         <th><h4> Date</h4></th>
//     </thead>
//     <tbody>
//         <tr>
//             <td>Class Test</td>
//             <td>Mathematics</td>
//             <td>4.0</td>
//             <td>98.00</td>
//             <td><img src="../assets/imgs/school.jpg" alt=""></td>
//             <td>20/06/2023</td>
//         </tr>
//     }
// };
?>