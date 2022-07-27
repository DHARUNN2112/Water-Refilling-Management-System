<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
}

.op{
    color: #0748b0;
    font-size: 60px;
}


body{
    background-color: white;
}
.main{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.box{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #0748b0;
    position: relative;
}
.box span{
    position: absolute;
    top: -100%;
    left: -105px;
    width: 800%;
    height: 80px;
    border: 4px solid #6495ed;
    border-radius: 50%;
    animation: anim 4s infinite;
}
.box span:nth-child(1){
    transform: rotate(-60deg);
    animation: anim2 4s infinite;
}
.box span:nth-child(2){
    transform: rotate(60deg);
    animation: anim3 4s infinite;
}
@keyframes anim{
    0%,100%{transform: rotate(0deg);}
    50%{transform: rotate(360deg);}
}
@keyframes anim2{
    0%,100%{transform: rotate(-60deg);}
    50%{transform: rotate(-300deg);}
}
@keyframes anim3{
    0%,100%{transform: rotate(60deg);}
    50%{transform: rotate(300deg);}
}
</style>
<body>
<div>
    <center>
    
    <?php
    $connect = mysqli_connect("localhost", "root", "", "test");

    if($connect === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }
    
    function ageCalculator($dob){
        if(!empty($dob)){
            $birthdate = new DateTime($dob);
            $today   = new DateTime('today');
            $age = $birthdate->diff($today)->y;
            return $age;
        }else{
            return 0;
        }
    }

    $lname =  $_POST['last_name'];
    $fname = $_POST['first_name'];
    $dob =  $_POST['dob'];
    $age = ageCalculator($dob);
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state =  $_POST['state'];
    $pin = $_POST['pin'];
    $email =  $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $r_password =  $_POST['password_repeat'];
   
    $sql = "Select * from Person where Username='$username';";
    $ck=mysqli_query($connect,$sql);
    $ck= mysqli_num_rows($ck);
    $s='person_seq';
    if($ck==0){
        if($password==$r_password){
            $sql = "Select * from pincode where Pin=$pin";
            $ck=mysqli_query($connect,$sql);
            $ck= mysqli_num_rows($ck);
            if($ck==0){
                $sql1="INSERT INTO  pincode VALUES ($pin,'$city','$state');";
                mysqli_query($connect,$sql1);
            }
            $sql2="INSERT INTO  person VALUES (nextval($s),'$fname','$lname','$dob',$age,'$email','$username','$password',$pin);";
            $sql3="INSERT INTO  customer VALUES (lastval($s),'$gender');";
            $sql4="INSERT INTO  person_mobile VALUES (lastval($s),'$phone');";
            
            mysqli_query($connect,$sql2);
            mysqli_query($connect,$sql3);
            mysqli_query($connect,$sql4);
            echo "<div class='op'>You have been successfully registered</div>";
            
            header('Refresh: 3; URL=login.html');   
        }
        else{
            
                echo "<div class='op'>Password does not match, Please retry.</div>"; 
                header('Refresh: 3; URL=register.html');
        }
    }
    else{
        echo "<div class='op'>User Name already Taken Please try again!!</div>";
        header('Refresh: 3; URL=register.html');
    }
    
    mysqli_close($connect);
    ?> 
</center>
    <div class="main">
    <div class="box">
        <span></span>
        <span></span>
        
        <span></span>
    </div>
    </div>
</div>
    
</body>
</html>