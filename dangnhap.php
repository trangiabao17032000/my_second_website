<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">      
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script type="text/javascript" src="./js/js.js"></script>
</head>
<?php
  include("top.php");
?>
<div class="card bg-white my-3 ">
  <img src="./img/dangnhap.jpg" class="card-img" alt="..." height="500">
  <div class="card-img-overlay">
    <div class="col-sm-5">
        <form action="xuly.php" method="post" class="">
          <div class="text-light mx-5 my-3" >
              <span style="font-size: 25px">Đăng nhập</span>
              <span class="ml-5 text-white-50">Bạn chưa có tài khoản ?</span>
              <a class="text-info" href="./dangky.php" style="font-size: 20px">Đăng ký</a>
          </div>
          <hr style="border: 1px solid gray">
          <div class="form-group mx-5">
            <div class="alert alert-danger text-center" id="tb" style="display:none">Tài khoản này không tồn tại</div>
            <input type="text" class="form-control my-4 w-75" id="taikhoan" name="taikhoan" placeholder="Tài khoản" style="opacity: 0.7;">
            <div class="alert alert-danger w-75" id="tbtk" style="display:none">Vui lòng điền tài khoản</div>
            <input type="password" class="form-control my-4 w-75" id="matkhau" name="matkhau" placeholder="Mật khẩu" style="opacity: 0.7;">
            <div class="alert alert-danger w-75 mb-2" id="tbmk" style="display:none">Vui lòng điền mật khẩu</div>
            <a href="#" class="text-light mx-3 my-3">Quên mật khẩu</a>
            <hr style="border: 0.5px solid gray">
            <button type="submit" class="btn btn-primary form-control my-3 w-75" name="dangnhap" onclick="return kiemTraDN();"
                    style="opacity: 0.8;">
                Đăng Nhập
            </button>
          </div> 
    </form>
    </div>
  </div>
</div>
<?php
    include("foot.php");
?>