<?php
//include 'login.php';
    session_start();
    if (!$_SESSION['User']){
        header("location:login.html");
        die();
    }
?>


<html>
<body>
<input type="text" value="flag_submit" placeholder="Insert the 1st flag" >

    <button type="submit" onclick="
    if ( onsubmit === key){
    alert('cookies are the best')">Submit</button>
    }
    else {

    }
</body>
</html>