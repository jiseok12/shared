<?php
    session_start();
    if($_POST['username']=="" || $_POST['password']==""){
        echo "<script>location.href='/shared.html'</script>";
    }
    else{
        $_SESSION["id"]=$_POST['username'];
        $_SESSION["passwd"]=$_POST['password'];
        echo "<script>location.href='/main.php'</script>";
    }
?>