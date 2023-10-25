<?php 

    $phone = "sddsddsds";
    if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phone)){
echo "not good";
    }else{
        echo " good";
    }
?>