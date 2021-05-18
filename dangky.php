<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
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
  <img src="./img/dangky.jpg" class="card-img" alt="..." height="650">
  <div class="card-img-overlay">
    <div class="col-sm-5">
        <form action="xuly.php" method="post">
          <div class="text-light mx-3 my-3" >
              <span style="font-size: 25px">Đăng ký</span>
              <span class="ml-5 text-white-50">Bạn đã có tài khoản ?</span>
              <a class="text-info" href="./dangnhap.php" style="font-size: 20px">Đăng ký</a>
          </div>
          <hr style="border: 1px solid gray">
          <div class="form-group mx-5">
            <input type="text" class="form-control my-4 w-75" id="taikhoan" name="taikhoan" placeholder="Tài khoản" style="opacity: 0.8;">
            <div class="alert-sm alert-danger w-75" id="loitk" style="display:none">Tài khoản phải nhiều hơn 7 ký tự</div>

            <input type="password" class="form-control my-4 w-75" id="matkhau" name="matkhau" placeholder="Mật khẩu" style="opacity: 0.8;">
            <div class="alert-sm alert-danger w-75" id="loimk" style="display:none">Mật khẩu phải nhiều hơn 7 ký tự</div>
            <input type="password" class="form-control my-4 w-75" id="nhaplaimk" name="nhaplaimk" placeholder="Nhập lại mật khẩu " style="opacity: 0.8;">
            <div class="alert-sm alert-danger w-75" id="loinlmk" style="display:none">Mật khẩu nhập lại không đúng</div>

            <input type="text" class="form-control my-4 w-75" id="hoten" name="hoten" placeholder="Họ và tên" style="opacity: 0.8;">
            <div class="alert-sm alert-danger w-75" id="loihoten" style="display:none">Họ tên không hợp lệ</div>

            <input type="text" class="form-control my-4 w-75" id="diachi" name="diachi" placeholder="Địa chỉ" style="opacity: 0.8;">
            <div class="alert-sm alert-danger w-75" id="loidiachi" style="display:none">Vui lòng điền vào địa chỉ</div>

            <input type="text" class="form-control my-4 w-75" id="dienthoai" name="dienthoai" placeholder="Điện thoại" style="opacity: 0.8;">
            <div class="alert-sm alert-danger w-75" id="loidienthoai" style="display:none">Điện thoại không hợp lệ</div>
            <hr style="border: 0.5px solid gray">
            <div class="bd-example">
              <button type="reset" class="btn btn-secondary my-3 mx-5 btn-lg" name="reset"style="opacity: 0.9;">
                Đặt Lại
            </button>
            <button type="submit" class="btn btn-primary my-3 btn-lg" name="dangky" onclick="return kiemTraDK();"style="opacity: 0.9;">
                Đăng Ký
            </button>
            </div>
            
          </div> 
    </form>
    </div>
  </div>
</div>
<?php
    include("foot.php");
?>