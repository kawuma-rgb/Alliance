<?php
// error_reporting(0);
    
// function crawl_page($url) {
  
//     $dom = new DOMDocument('1.0');
      
//     // Loading HTML content in $dom
//     @$dom->loadHTMLFile($url);
      
//     // Selecting all image i.e. img tag object
//     $anchors = $dom -> getElementsByTagName('img');
      
//     // Extracting attribute from each object
//     foreach ($anchors as $element) {
          
//         // Extracting value of src attribute of
//         // the current image object
//         $src = $element -> getAttribute('src');
          
//         // Extracting value of alt attribute of
//         // the current image object
//         $alt = $element -> getAttribute('alt');
          
//         // Extracting value of height attribute
//         // of the current image object
//         $height = $element -> getAttribute('height');
          
//         // Extracting value of width attribute of
//         // the current image object
//         $width = $element -> getAttribute('width');
          
//         // Given Output as image with extracted attribute,
//         // you can print value of those attributes also
//         echo '<img src="'.$src.'" alt="'.$alt.'" height="'
//                 . $height.'" width="'.$width.'"/>';
//     }
// } 
   
// crawl_page('C:/xampp/htdocs/codes/alliance/includes/main.php');

// $dom = new DOMDocument();

// $dom->loadHTML('img');
// $path = new DOMXPath($dom);
// $element = $path->query('//img[@id="img"]');

// if ($element->length > 0) {
//     $loadedElement = $element->item(0);
//     // Access the element's content or attributes
//     $textContent = $loadedElement->textContent;
//     $attributeValue = $loadedElement->getAttribute('src');
// }


//

require_once '../../admin/includes/pdo.php';
$tables = ['student','teacher'];
foreach ($tables as $table) {
    # code...

$sql = "select * from $table order BY DateCreated DESC";
$smt = $pdo->query($sql);
$recentData = $smt->fetchAll (PDO::FETCH_ASSOC);
if($table== 'student'){
    
}else if($table == 'teacher'){
    echo 'teacher';
}else{
    echo 'no table found';
}
foreach($recentData as $data){
    if($table== 'student'){
        $data = ['fname','lname','lin_number'];
    }
    foreach ($data as $key => $value) {
        
        echo "$key : $value";
    }
}

}

    # code...
 
    ?>
<table>
    <tr>
        <!-- <td><?php echo $key[$value]?> </td> -->
    
    </tr>
</table>


