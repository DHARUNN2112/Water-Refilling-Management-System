<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Catalog - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/css/Roboto.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Pretty-Product-List.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Product-List.css">
    <link rel="stylesheet" href="assets/css/featured-products-slider-1.css">
    <link rel="stylesheet" href="assets/css/featured-products-slider.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/shopping-ecommerce-products.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>
<?php
    $connect=mysqli_connect("localhost", "root", "", "test");
    $p_id=$_SESSION['p_id'];
    $sql = "SELECT * FROM cart WHERE P_ID='$p_id';";
    $total_price=0;
    
?>
<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">AquaFire</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="product.html">PRODUCT</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">USER</a></li>
                    <li class="nav-item"><a href="#">&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link active" href="cart.php">CART</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading"><br><br>
                    <h2 class=" bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold" align='center'>Cart</h2>
                    <p></p>
                </div>
                <div class="content"></div>
            </div><div class="shopping-cart">
<div class="px-4 px-lg-0">

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
        
          <!-- Shopping cart table -->
          <div class="table-responsive">
          <?php
  
              
              
              if($query_run=mysqli_query($connect,$sql)){
                  if(mysqli_num_rows($query_run) > 0){
                    echo'
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Product</div>
                          </th>
                          <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Price</div>
                          </th>
                          <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Quantity</div>
                          </th>
                        </tr>
                      </thead>';
                    while($row= mysqli_fetch_array($query_run)){
                      echo'<tbody><tr>';
                      echo'    <td scope="row" class="border-0">
                            <div class="p-2">
        <div class="ml-3 d-inline-block align-middle">
          
          <h5 class="mb-0"> <a href="product.html" class="text-dark  align-middle col-12">'.$row["Product_Name"].'</a></h5>
                            </div>
                            </div>
                          </td>';
                      $price=$row["Price"];
                      $total_price=$total_price+$price;
                      echo'<td class="border-0 align-middle"><strong>'.$price.'</strong></td>';
                      echo'<td class="border-0 align-middle"><strong>'.$row["Qty"].'</strong></td>';
                      echo'</tr>';
                      echo'</tbody>';
                }
              }
                else{
                  echo'<div><p class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</p></div>';
                }
              }
              else{
                echo'<h2 class=" bg-dark rounded-pill px-4 py-3 text-uppercase font-weight-bold" align="center">Empty Cart</h2>';
              } 
              echo'</table>';
                ?>
  
      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold"></div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply couon</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">&nbsp;</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">&nbsp; </strong><strong>&nbsp;</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">&nbsp;</strong><strong>&nbsp;</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">&nbsp;</strong><strong>&nbsp;</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><?php echo $total_price;?></h5>
              </li>
            </ul><a href="showcard.php" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
            <div class="container mtr-5 mb-2">
                <div class="row">
                    <div class="col-md-10 col-12">
                        <section></section>
                        <div class="shopping-grid"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p align='center'><br>Copyright&nbsp;© AquaFire 2022&nbsp;</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/featured-products-slider.js"></script>
</body>

</html>