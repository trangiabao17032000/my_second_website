<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css"> 
<link rel="stylesheet" href="./css/fontawesome.min.css">
<link rel="stylesheet" href="./css/svg-with-js.css">
<link rel="stylesheet" href="./css/all.min.css">
<link rel="stylesheet" href="./css/brands.min.css">
<link rel="stylesheet" href="./css/regular.min.css">
<link rel="stylesheet" href="./css/svg-with-js.css">
<link rel="stylesheet" href="./css/solid.min.css">
<link rel="stylesheet" href="./css/v4-shims.min.css">
<?php
  session_start();
  $tk=null; $mk=null;
  $url = isset($_GET['url']) ? $_GET['url'] : null;
  $key = isset($_GET['key']) ? $_GET['key'] : null;
  $user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
  $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
  if($cart == null)
  {
    $soluong = 0;
  }
  else
    $soluong = count($cart);
?>

<?php
  if($user==""){
    echo '
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="./index.php">
        <img src="./img/iconvourcher.PNG " width="30" height="30" class="d-inline-block align-top" alt="">
        <img src="./img/labelvourcher.PNG" width="200" height="30">
      </a>
      <form class="form-inline">
        <a class="btn btn-primary bg-dark mx-1 text-light" href="./dangnhap.php">Đăng nhập</a>
        <a class="btn btn-primary bg-dark mx-1 text-light" href="./dangky.php">Đăng ký</a>
        <a href="./cart.php" class="btn btn-primary bg-dark mx-1">
              <i class="fas fa-shopping-cart text-white">
                Giỏ Hàng
                <span class="badge badge-light mx-1">'. $soluong .'</span>
              </i>
        </a>
      </form>
  </nav>
  ';
  }else
  echo '
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="./index.php">
      <img src="./img/iconvourcher.PNG " width="30" height="30" class="d-inline-block align-top" alt="">
      <img src="./img/labelvourcher.PNG" width="200" height="30">
    </a>
    <form class="form-inline" action="xuly.php" method="post">
    <span id="loichao"> Chào mừng '.$user.'</span>
    <a type="button" class="btn rounded-circle btn-primary bg-dark mx-1" href="#">
        <i class="fa fa-user">     
        </i>
      </a>
      <button type="submit" class="btn btn-primary bg-dark float-right mx-1 my-1" data-toggle="modal" data-target="#dangnhap" id="dndk" name="dangxuat">Đăng Xuất
      </button>
      <a href="./cart.php" class="btn btn-primary bg-dark mx-1">
              <i class="fas fa-shopping-cart text-white">
                Giỏ Hàng
                <span class="badge badge-light mx-1">'. $soluong .'</span>
              </i>
      </a>
    </form>
  </nav>
  '
  ?> 
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" style="clear: right; clear: left;" >
    <div class="container-fluid">
       <form class="form-inline" action="product.php?" method="_GET">
          <input class="form-control mr-sm-3" type="search" placeholder="Tên sản phẩm" name="key">
          <button class="btn btn-outline-light my-2 my-sm-0 mx-3" type="submit" id="timkiem" >Tìm Kiếm</button>
      </form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="./index.php?url=home" class="nav-link <?php if($url=='home'||($url=='')) echo "active"?>">Trang Chủ</a>
          </li>
          <li class="nav-item">
            <a href="./product.php?url=product" class="nav-link <?php if($url=='product') echo "active"?>">Sản Phẩm</a>
          </li>
          <li class="nav-item">
            <a href="./thongtin.php?url=thongtin" class="nav-link <?php if($url=='thongtin') echo "active"?>">Thông tin</a>
          </li>
          
        </ul>
      </div>  
    </div>
  </nav>
  </div>

  
