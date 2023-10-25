
<?php require_once 'head.php';

?>

<?php
#import php file
if(isset($_GET['id'])):
    require_once '../../admin/includes/pdo.php';
    $id = $_GET['id'];
    // echo $id;

$sql = "select * from teacher where teacher_id = $id";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

?>
<?php
if(isset($_POST['submit'])){
// validate and chnge phne number into international number
function validatePhoneNumber($phoneNumber) {
    // Remove any non-digit characters from the phone number
    $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
   
    // Check if the phone number is valid
    if (strlen($phoneNumber) >= 10 && strlen($phoneNumber) <= 15) {
        return true;
    }
    return false;
}

    
    function applyPhoneNumberMask($phoneNumber) {
    // Remove any non-digit characters from the phone number
    $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

    // Apply the phone number mask
    $maskedPhoneNumber = '';
    $mask = '+(XXX)XX XXX-XXXX'; // Example mask: +X (XXX) XXX-XXXX

    $j = 0;
    for ($i = 0; $i < strlen($mask); $i++) {
        if (substr($phoneNumber, 0, 1) === '0') {
            // Replace the first zero with 256
            $phoneNumber = '256' . substr($phoneNumber, 1);
        }
        
        if ($mask[$i] == 'X') {
           
            $maskedPhoneNumber .= $phoneNumber[$j];
            $j++;
        }
        
        else {
            $maskedPhoneNumber .= $mask[$i];
        }
    }
    
    return $maskedPhoneNumber;
}


// declare msked and  vlid phone number
$phoneNumber = strval($_POST['contact']);
if (validatePhoneNumber($phoneNumber)) {
    $pho= applyPhoneNumberMask($phoneNumber);
}

// image

$pic = $row['photo'];

// function loadImageSrc($url){
    // $dom = new DOMDocument('1.0');
    // @$dom->loadHTMLFile($url);
    //  $anchors = $dom->getElementsByTagName('img');
    //  foreach ($anchors as $element) {
    //     # code...
    //     $src = $element->getAttribute('src');
    //     echo $src;

    //  }
// }
// loadImageSrc($pic);


    $f  = $_POST['fname'];
    $l  = $_POST['lname'];
    $g  = $_POST['gender'];
    $i  = $_POST['initials'];
    // $p  = $_POST['photo'];
    $ll  = $_POST['location'];
    $id  = $_POST['id'];
    $sql = "update teacher set fname=' $f' ,lname= '$l', Gender = '$g' , intials = '$i', location='$ll' ,Phone_no = '$pho ' Where teacher_id = '$id'";
    $stmt =$pdo->query($sql);
    if($stmt){
        echo '<script></script>';
    }else{
        echo 'failed to updated';

    }
}


// $dom = new DOMDocument('1.0');
// @$dom->loadHTMLFile('img');
//  $anchors = $dom->getElementById('img');
//  echo $anchors;

//     // $src = $anchors->getAttribute('src');

?>


<form method="post" enctype="multipart/form-data"  >
    <div class="main-div-teacher">
        <img id="img" width="100px" src="<?php echo $row['photo']?>" name="photo"  alt="">
  
        <input type="text" required="true" name='fname' value="<?php echo $row['fname']?>" placeholder="First Name">
        <input type="text" required="true" name='lname' value="<?php echo $row['lname']?>" placeholder="Last Name">
        <select name="gender" id="gender">
            <option value="select gender">Select the gender</option>
            <option value=" female" <?php if($row['Gender']=="female") {echo 'selected';}?>>female</option>
            <option value="male" <?php if($row['Gender']=="male") {echo 'selected';}?>>male</option>
            <option value="other" <?php if($row['Gender']=="other") {echo 'selected';}?>>other</option>

        </select>
        <input type="text" required="true" name="location" value="<?php echo $row['location'];?>" placeholder="Location">
        <input type="text" required="true" name="initials" value="<?php echo $row['intials'];?>" placeholder="initials">
        <input   type="tel" id="phone"  name="contact" value="<?php echo $row['Phone_no']?>" required="true" >
        <input type="hidden" name="id" value="<?php echo $row['teacher_id']?>">
        <!-- <input id=  type="tel" name="contact" required="true" > -->


        <button class="button" type="submit" name="submit">update</button>

    </div>

</form>



<?php endif;?>


<script>
    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=c882e7aec3e0dd', {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then((resp) => resp.json())
            .catch(() => {
                return {
                    country: 'us',
                };
            })
            .then((resp) => callback(resp.country));
    }

    const phoneInputField = document.querySelector("#phone");
    window.intlTelInput
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: getIp, 
         preferredCountries: ["ug", "co", "us", "de"],
        utilsScript: "../assets/js/utils.js",
    });
  

 


</script>

<?php
require_once 'footer.php';
?>