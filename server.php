<?php
if(isset($_POST['submit']))
{
    ob_end_clean();

    $name = $post['user_name'];

    sessionvalidate($_POST['CSR'],$_COOKIE['session_id_ass2']);
}

function sessionvalidate($user_CSRF,$user_sessionID){
    if($user_CSRF==$_COOKIE['csrf_token'] && $user_sessionID==session_id()){
        header("Location:level_2.php");
        echo'<script>alert($name)';
        apcu_delete('CSRF_token');
    } else {
        header("Location:level_2.php");
        echo "cookie : ".$_COOKIE[csrf_token];
        echo "user : ".$user_CSRF;
    }
}
