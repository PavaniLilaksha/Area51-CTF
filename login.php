<?php
$username=$_POST['username'];
$password=$_POST['password'];

include_once 'db.php';
$databse = new db();
$con = $databse->getConnection();

if(!empty($username) || !empty($password)){
    $connection = $con;
    if($con){

            session_start();

            $sessionID = session_id();

            if(empty($_SESSION['key']))
            {
                $_SESSION['key']=bin2hex(36343664353637353631353334323332363135373532373034393438356137303539333236623364);
            }

            $token = hash_hmac('sha256', $sessionID, $_SESSION['key']);

            setcookie("session_id_ass2",$sessionID,time()+3600,"/","localhost",false,true);

            setcookie("csrf_token",$token,time()+3600,"localhost",false,true);

            header("refresh:0; url=level_2.php");
            echo '<form method="post" action="server.php">';
            echo "<script>alert('Can flags be forged in cookie jars?')</script>";
            die();


            $sql="SELECT count(*) as totalrow from login where username='$username' and password='$password'";
            $stamnet = $connection->prepare($sql);
            $stamnet->execute();
            $count = $stamnet->fetch(PDO::FETCH_ASSOC);
            if($count['totalrow'] == 1){
                $_SESSION['User']=$_POST['username'];
                header ("refresh:0; url=level_2.php");
            }else{
                echo "<script>alert('User name or Password Incorrect !')</script>";
                header ("refresh:0; url=login.html");
            }

    }else{
        header ("refresh:1; url=login.html");
    }
}else{
    header ("refresh:0; url=login.html");
    echo "<script>alert('Please enter user name and password !')</script>";
    die();
}

?>
