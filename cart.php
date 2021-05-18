<!DOCTYPE html>
<html lang="en">
<head>
	<title>Giỏ hàng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">     
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/jquery.bootstrap-touchspin.css" rel="stylesheet">
    <script type="text/javascript" src="./js/js.js"></script>
</head>
	 <?php
		  include("top.php");
    ?>  
    <a class= "text-center mx-4" href="./lichsumuahang.php" style="font-size: 23px;">Lịch sử mua hàng</a>
    <style type="text/css">
    body
    {
      overflow-x: hidden;
    }
    </style>
    <?php
        function QuyDoiTienTe($so)
        {
                $du;
                $tiente=""; $dem=0;
                while($so>=1)
                {
                  if($dem==3)
                  {
                    $tiente=".".$tiente;
                    $dem=0; 
                  }
                  else{
                    $du=$so%10;
                    $dem++;
                    $tiente=$du.$tiente;
                    $so/=10;
                  }
                }
               return $tiente." đ";
        }
        $stt = 1;
        $hinh = "";
        if(isset($_SESSION["cart"])&&count($_SESSION["cart"])!=0)
        {
            echo '
            <div class="container-fluid my-3">
              <form class="form-horizontal" role="form">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ẢNH</th>
                      <th scope="col">TÊN SẢN PHẨM</th>
                      <th scope="col" class="pl-5">SỐ LƯỢNG</th>
                      <th scope="col" class="text-right">GIÁ</th>
                      <th scope="col" class="text-right">TỔNG</th>
                      <th scope="col" class="text-right">XÓA</th>
                    </tr>
                  </thead>
                  <tbody>
            ';
            $tongtien = 0;
            foreach ($_SESSION["cart"] as $key => $author)
            {
                $hinh = "./img/". $author["masp"] . ".jpg";
                $tongtien += $author["giasp"] * $author["slsp"];
                echo '
                    <tr>
                      <td scope="row"><img height=100px src="'.$hinh.'"/></td>
                      <td scope="row"><div class="mt-4 font-weight-bold">'. $author['tensp'] .'</div></td>
                      <td>
                        <div class="input-group mt-4 w-50">
                          <div class="input-group-prepend">
                            <a draggable="false" class="text-light btn btn-info" href="'. './xuly.php?action=decrease&&msp='.$author["masp"]. '">-</a>
                          </div>
                          <input min="1" id="'.$author['masp'] .'" class="text-center w-50" value="' .$author['slsp'] . '" onblur="ThayDoi(this.value,this.id)"/>
                          <div class="input-group-append">
                            <a draggable="false" class="text-light btn btn-info" href="'. './xuly.php?action=increase&&msp='.$author["masp"]. '">+</a>
                          </div>
                        </div>
                      </td>
                      <td class="text-right"><div class="mt-4"><div class="mt-4">' . QuyDoiTienTe($author["giasp"]). '</div></td>
                      <td class="text-right"><div class="mt-4">' . QuyDoiTienTe($author["giasp"] * $author["slsp"]). '</div></td>
                      <td class="text-right">
                        <div class="mt-4">
                          <a draggable="false" class="btn btn-danger text-light" onclick="return ThongBao();"" href="'. './xuly.php?action=delete&&msp='.$author["masp"]. '">
                            <i class="fa fa-trash-alt"></i>
                          </a>
                        </div>
                        </td>
                    </tr>
                ';
            }
            echo          
            '
                  <tr>
                    <th colspan="2"></th>
                    <th class="text-right text-danger" style="font-size: 20px;">Tổng Cộng</th>
                    <td colspan="2" class="text-right text-danger font-weight-bold" style="font-size: 20px;">' . QuyDoiTienTe($tongtien) . '</td>
                    <th></th>
                  </tr>
                    </tbody>
                </table>
              </form>
              <div class="row justify-content-center my-4">
                <a href="./thanhtoan.php" class="btn btn-primary bg-primary my-4" style="font-size: 25px;">
                    Thanh toán
                </a>
                </div>
            </div>
            ';
        }   
        else
        {
          echo '
          <div class="text-center">
          <img src="./img/cart.gif" height="500px" class="rounded" alt="...">
          </div>
          <div class="text-center my-3">
          <h4 class="text-danger">Không có sản phẩm nào trong giỏ hàng của bạn.</h4>
          <a class="btn btn-primary"  style="font-size: 25px" href="./product.php?url=product">
                Tiếp tục mua sắm
          </a>
          </div>
          ';
        }
    ?>

<?php
		include("foot.php");
?>

</html>
<script type="text/javascript">
  function ThayDoi(value,id)
  {
    window.location="./xuly.php?action=change&&msp=" + id + "&&soluong=" + value;
  }
</script>