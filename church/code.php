<?php
include('security.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 

    $password_login=md5($_POST['passwordd']);

    $query = "SELECT * FROM church_users WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "catholic")
    {
        $_SESSION['email'] = $email_login;
        $_SESSION['odmsaid']=$user_id;

        header('Location: dashboard.php');
    }
    else if($usertypes['usertype'] == "advantist")
    {
        $_SESSION['email'] = $email_login;
        $_SESSION['odmsaid']=$user_id;

        header('Location: dashboard2.php');
    }
    else if($usertypes['usertype'] == "adpr")
    {
        $_SESSION['email'] = $email_login;
        $_SESSION['odmsaid']=$user_id;
        header('Location: dashboard3.php');
    }
    else if($usertypes['usertype'] == "anglican")
    {
        $_SESSION['email'] = $email_login;
        header('Location: dashboard4.php');
    }
    else
    {
        echo "<script>alert('User blocked');</script>"; 
    }
}
?>