<?php session_start();?>
<!DOCTYPE html>
<html>
<title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</title>


<style>
    .op{
    color: #bb5f27;
    font-size: 40px;
}
	body {
  background: black;
  overflow: hidden;
}

.centerBike {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: 26px;
  margin-left: -12px;
}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -50px;
}

#loop {
  height: 100px;
  width: 100px;
  border: #bb5f27 solid 4px;
  border-radius: 200px;
}

#loop:before {
  background: linear-gradient(to left, rgba(187, 95, 39, 0) 0%, rgba(187, 95, 39, 1) 30%, rgba(187, 95, 39, 1) 70%, rgba(187, 95, 39, 0) 100%);
  content: "";
  display: block;
  height: 4px;
  left: -100px;
  position: relative;
  top: 100px;
  width: 300px;
}

#bike-wrapper {
  height: 108px;
  width: 108px;
  animation: drive 3s linear infinite;
}

#bike {
  height: 24px;
  width: 25px;
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/133687/motorbike.png");
}

@keyframes drive {
  0% {
    margin-left: -364px;
    opacity: 0;
  }
  33.33% {
    transform: rotate(0deg);
    margin-left: -50px;
    opacity: 1;
  }
  66.66% {
    transform: rotate(-360deg);
    margin-left: -50px;
    opacity: 1;
  }
  100% {
    margin-left: 264px;
    transform: rotate(-360deg);
    opacity: 0;
  }
}
</style>
<body>

    
<div id="loop" class="center"></div>
	<div id="bike-wrapper" class="center">
	  <div id="bike" class="centerBike"></div>
	</div><center>
    <?php
    $connect=mysqli_connect("localhost", "root", "", "test");
    $user=$_SESSION['user'];
    $p_id=$_SESSION['p_id'];
    if($_POST['liter']){
    $liter=$_POST['liter'];
    $qty=$_POST['qty'];
    $water=$_POST['water'];
    
    $query="SELECT * FROM product where Prod_ID in (select C.Prod_ID from product C natural join water A natural join container B WHERE A.Water_Type='$water' and B.Container_Type='$liter');";
    $query_run=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($query_run);
    $pname= $row['Product_Name'];
    $prod_id= $row['Prod_ID'];
    
    $price = $qty*$row['price'];
    $sql="INSERT INTO  cart VALUES ($p_id,$prod_id,'$pname',$qty,$price);";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    echo "<div class='op'>Successfully added to cart</div>";
    }
    else{
        echo "<div class= 'op'>Select Item</div>";
    }
    header('Refresh: 3; URL=product.html');  
    ?></center>

</body>
</html>