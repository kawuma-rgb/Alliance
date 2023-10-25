
<?php require_once 'head.php';

?>

<?php
#import php file
if(isset($_GET['id'])):
    require_once '../../admin/includes/pdo.php';
    $id = $_GET['id'];
    // echo $id;

$sql = "select * from student where lin_number = '$id'";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

?>
<?php
if(isset($_POST['submit'])){
// image work on 


    $f  = $_POST['fname'];
    $l  = $_POST['lname'];
    $g  = $_POST['gender'];
    $h  = $_POST['house'];
    $c  = $_POST['class'];

    $d  = $_POST['date'];
    // $id  = $_POST['id'];
    $sql = "update student set fname=' $f' ,lname= '$l', class= '$c', gender = '$g' ,house='$h' ,Birthdate='$d' Where lin_number = '$id'";
    $stmt =$pdo->query($sql);

    if(!$stmt) {
      die("Error");
    }
    else {
      header("location: student.php");
    }
 
}
?>


<form method="post" enctype="multipart/form-data"  >
    <div class="main-div-teacher">
     
        <input type="text" required="true" name='fname' value="<?php echo $row['fname']?>" placeholder="First Name">
        <input type="text" required="true" name='lname' value="<?php echo $row['lname']?>" placeholder="Last Name">
     
        <select name="gender" id="gender">
            <option value="select gender">Select the gender</option>
            <option value=" female" <?php if($row['gender']="female") {echo 'selected';}?>>female</option>
            <option value="male" <?php if($row['gender']="male") {echo 'selected';}?>>male</option>
            <option value="other" <?php if($row['gender']="other") {echo 'selected';}?>>other</option>

        </select>
        <select name="class" id="class">
            <option value="select class">Select the class</option>
            <option value="s1" <?php if($row['class']="s1")echo 'selected';?>>s1</option>
            <option value="s2" <?php if($row['class']="s2")echo 'selected';?>>s2</option>
            <option value="s3" <?php if($row['class']="s3")echo 'selected';?>>s3</option>
            <option value="s4" <?php if($row['class']="s4")echo 'selected';?>>s4</option>
            <option value="s5" <?php if($row['class']="s5")echo 'selected';?>>s5</option>
            <option value="s6" <?php if($row['class']="s6")echo 'selected';?>>s6</option>
            

        </select>
        <select name="Nin_status" id="Nin_status">
            <option value="select Nin_status">Select the Nin_status</option>
            <option value=" true" <?php if($row['nin_status']="true")  {echo 'selected';}?>>true</option>
            <option value=" false"<?php if($row['nin_status']="false") {echo 'selected';}?>>false</option>
 

        </select>
        <?php echo $row['house']?>
        <select name="house">
            <option value="<?= htmlspecialchars($row['house']); ?>" selected>Currently *<?= htmlspecialchars($row['house']); ?>* </option>
          <option value="joiners">Joiners</option>
          <option value="venus">venus</option>
          <option value="Lubwama">Lubwama</option>

        </select>
        <input type="date" name="date" id="" value="<?php echo  $row['Birthdate'];?>" placeholder="date">
        <button class="button" type="submit" name="submit">update</button>

     
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
  

 
    
    // Obtain UI widgets
const nativePicker = document.querySelector(".nativeDatePicker");
const fallbackPicker = document.querySelector(".fallbackDatePicker");
const fallbackLabel = document.querySelector(".fallbackLabel");

const yearSelect = document.querySelector("#year");
const monthSelect = document.querySelector("#month");
const daySelect = document.querySelector("#day");

// hide fallback initially
fallbackPicker.style.display = "none";
fallbackLabel.style.display = "none";

// test whether a new date input falls back to a text input or not
const test = document.createElement("input");

try {
  test.type = "date";
} catch (e) {
  console.log(e.message);
}

// if it does, run the code inside the if () {} block
if (test.type === "text") {
  // hide the native picker and show the fallback
  nativePicker.style.display = "none";
  fallbackPicker.style.display = "block";
  fallbackLabel.style.display = "block";

  // populate the days and years dynamically
  // (the months are always the same, therefore hardcoded)
  populateDays(monthSelect.value);
  populateYears();
}

function populateDays(month) {
  // delete the current set of <option> elements out of the
  // day <select>, ready for the next set to be injected
  while (daySelect.firstChild) {
    daySelect.removeChild(daySelect.firstChild);
  }

  // Create variable to hold new number of days to inject
  let dayNum;

  // 31 or 30 days?
  if (
    [
      "January",
      "March",
      "May",
      "July",
      "August",
      "October",
      "December",
    ].includes(month)
  ) {
    dayNum = 31;
  } else if (["April", "June", "September", "November"].includes(month)) {
    dayNum = 30;
  } else {
    // If month is February, calculate whether it is a leap year or not
    const year = yearSelect.value;
    const isLeap = new Date(year, 1, 29).getMonth() === 1;
    dayNum = isLeap ? 29 : 28;
  }

  // inject the right number of new <option> elements into the day <select>
  for (let i = 1; i <= dayNum; i++) {
    const option = document.createElement("option");
    option.textContent = i;
    daySelect.appendChild(option);
  }

  // if previous day has already been set, set daySelect's value
  // to that day, to avoid the day jumping back to 1 when you
  // change the year
  if (previousDay) {
    daySelect.value = previousDay;

    // If the previous day was set to a high number, say 31, and then
    // you chose a month with less total days in it (e.g. February),
    // this part of the code ensures that the highest day available
    // is selected, rather than showing a blank daySelect
    if (daySelect.value === "") {
      daySelect.value = previousDay - 1;
    }

    if (daySelect.value === "") {
      daySelect.value = previousDay - 2;
    }

    if (daySelect.value === "") {
      daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  // get this year as a number
  const date = new Date();
  const year = date.getFullYear();

  // Make this year, and the 100 years before it available in the year <select>
  for (let i = 0; i <= 100; i++) {
    const option = document.createElement("option");
    option.textContent = year - i;
    yearSelect.appendChild(option);
  }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = () => {
  populateDays(monthSelect.value);
};

monthSelect.onchange = () => {
  populateDays(monthSelect.value);
};

//preserve day selection
let previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = () => {
  previousDay = daySelect.value;
};

</script>

</script>

<?php
require_once 'footer.php';
?>