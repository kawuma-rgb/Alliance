<?php require_once 'head.php' ?>
<head>
<link rel="stylesheet" href="../assets/js/intlTelInput.css" />
    <script src="../assets/js/intlTelInput.min.js"></script>
</head>
<style>
    #phone{
        height: 40px;
    width: 540px;
    margin: 10px auto;
    outline: none;
    border: 1px solid black;
    padding: 10px 70px;
    color: var(--secondary_color);
    background: var(--dim);
    border: none;
    border-bottom: 2px solid var(--secondary_color);
    }

</style>
<?php
#import php file
require_once '../../admin/includes/pdo.php';
$table = 'teacher';
// if the vlue of the fields are true

if (isset($_POST['submit']) ) {

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


// echo $pho;
// image upload  into database 
$target = "image/";
$targetFile = $target.basename($_FILES['picture']['name']);
move_uploaded_file($_FILES['picture']['tmp_name'],$targetFile);

    // sql connnection to insert into database
    $f  = $_POST['fname'];
    $l  = $_POST['lname'];
    $g  = $_POST['gender'];
    $i  = $_POST['initials'];
    $l  = $_POST['location'];
    


$sql = 'insert into teacher (fname,lname,intials,Phone_no,photo,location,Gender) values(:fn,:ln,:in,:ph,:pho,:l,:g)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':fn' => $f,
    ':ln' => $l,
    ':in' => $i,
    ':l' => $l,
    ':ph' => $pho,
    ':pho' => $targetFile,
    ':g' => $g
]);

}
// header("Loaction:teacher.php");
?>


<form method="post" enctype="multipart/form-data"   >
    <div class="main-div-teacher">
      <input type="file" name="picture" id="picture">
        <input type="text" required="true" name='fname' placeholder="First Name">
        <input type="text" required="true" name='lname' placeholder="Last Name">
        <select name="gender" id="gender" required>
            <option value=" female">Select the gender</option>
            <option value=" female">female</option>
            <option value="male">male</option>
            <option value="other">other</option>

        </select>
        <input type="text" required="true" name="initials" placeholder="initials">
        <input type="text" required="true" name="location" placeholder="Location">
        <input   type="tel" id="phone"  name="contact" required="true" >
      
      


        <button class="button" type="submit" name="submit"  >Register</button>

    </div>

</form>
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
<?php require_once 'footer.php' ?>