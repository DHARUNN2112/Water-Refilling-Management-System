<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading animation</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    
</head>
<style>
.op{
    color: white;
    font-size: 80px;
}
*{
    margin: 0;
    padding: 0;
}
body{
    background-color: #d7385e;
}
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
}
span{
    width: 25px;
    height: 120px;
    background-color: white;
    margin-left: 6px;
    transform: scaleY(0);
    animation: animate 1s linear infinite;
    animation-delay: calc(0.1s * var(--i));
}
@keyframes animate{
    0%,100%{
        transform: scaleY(0);
    }
    50%{
        transform: scaleY(1.5);
    }
}
</style>
<body><div>
    <center>
    <?php
      
        $connect=mysqli_connect("localhost","root","","test");

        $password=$_POST['password'];
        $username=$_POST['username'];
        $s = "select * from Employee where Username= '$username';";
        $result = mysqli_query($connect,$s);
        $num=mysqli_num_rows($result);

        if($num!=1){
            echo "<div class='op form-control-user'>User Name does not exist</div>";
            header('Refresh: 3; URL=login.html');
        }
        else {
            $s = "select * from Employee where Username= '$username' and Passwd='$password';";
            $result = mysqli_query($connect,$s);
            $num=mysqli_num_rows($result);
            if($num!=1){
                echo "<div class='op form-control-user'>Please Check password</div>";
                header('Refresh: 3; URL=login.html');
            }
            else{
                $_SESSION['user']= $username;
                $query="SELECT * FROM Employee where username='$username';";
                $query_run=mysqli_query($connect,$query);
                $row=mysqli_fetch_assoc($query_run);
                $_SESSION['name']= $row['Fname'];
                $_SESSION['e_id']=$row['E_ID'];
                $name=$_SESSION['name'];
                echo "<div class='op form-control-user'>WELCOME BACK $name</div>";
                header('Refresh: 3; URL=1.php');
            }
        }
        mysqli_close($connect);
    ?>
    </center></div>
    <div class="main">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
        <span style="--i:4;"></span>
        <span style="--i:5;"></span>
        <span style="--i:6;"></span>
        <span style="--i:7;"></span>
        <span style="--i:8;"></span>
        <span style="--i:9;"></span>
        <span style="--i:10;"></span>
    </div>
</body>
</html>