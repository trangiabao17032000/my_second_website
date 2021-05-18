<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">  
<?php
	session_start();
	if(isset($_POST['chondiachi']))
    {
        if(isset($_POST['diachi']))
        {
            $diachi = $_POST['diachi'];
        }
        else
        {
            $diachi = $_POST['diachi2'];
        }
        $phuongthucthanhtoan = $_POST['thanhtoan'];
        if($phuongthucthanhtoan == "tienmat")
        {
        	$phuongthucthanhtoan = "Tiền mặt";
        }
        $user = $_SESSION['username'];
        require 'DataProvider.php';
        $sql = "SELECT * FROM taikhoan WHERE taikhoan = '$user'";
        $result = DataProvider::executeQuery($sql);
        if(mysqli_num_rows($result) > 0)
        {
        	$row =mysqli_fetch_array($result);
        	$hoten = $row["hoten"];
        	$sdt = $row["dienthoai"];
            $makh = $row["makh"];
        }
        $date = getdate();
        $ngaymua = date("d-m-Y");
        $ngaydatdon =  date("Y-m-d");
        $_SESSION['diachigiao'] = $diachi;
        $_SESSION['phuongthucthanhtoan'] = $phuongthucthanhtoan;
        $_SESSION['ngayhoadon'] = $ngaydatdon;
        echo '<div class="conntainer border border-secondary mx-3 my-3">';
        echo '<h2 class="row justify-content-center text-danger"> Hóa đơn</h2>';
        echo '<p class="row justify-content-center">' .' Họ tên người mua : ' . $hoten . "</p>";
        echo '<p class="row justify-content-center">' ."Số điện thoại : " . $sdt . "</p>";
        echo '<p class="row justify-content-center">' ."Ngày hóa đơn : " . $ngaymua . "</p>";
        echo '<p class="row justify-content-center">' ."Địa chỉ giao  : " . $diachi . "</p>";
        echo '<p class="row justify-content-center">' ."Hình thức thanh toán : " . $phuongthucthanhtoan . "</p>";

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
?>

<?php
        $stt=1;
        echo '
            <div class="container-fluid my-3">
                <table class="table">
                  <thead class="thead">
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">TÊN SẢN PHẨM</th>
                      <th scope="col" class="text-left">SỐ LƯỢNG</th>
                      <th scope="col" class="text-right">GIÁ</th>
                      <th scope="col" class="text-right">TỔNG</th>
                    </tr>
                  </thead>
                  <tbody>
            ';
            $tongtien = 0;
            $tongsoluong = 0;
        foreach ($_SESSION["cart"] as $key => $author)
        {
            $hinh = "./img/". $author["masp"] . ".jpg";
                $tongtien += $author["giasp"] * $author["slsp"];
                $tongsoluong += $author["slsp"];
                echo '
                    <tr>
                      <td scope="row"><div class="mt-4 ">' . $stt. '</div></td>
                      <td scope="row"><div class="mt-4 ">'. $author['tensp'] .'</div></td>
                      <td scope="row"><div class="mt-4 ">'. $author['slsp'] .'</div></td>

                      <td class="text-right"><div class="mt-4"><div class="mt-4">' . QuyDoiTienTe($author["giasp"]). '</div></td>

                      <td class="text-right"><div class="mt-4">' . QuyDoiTienTe($author["giasp"] * $author["slsp"]). '</div></td>
                    </tr>
                ';
                $stt++;
        }
            $_SESSION['tongtien'] = $tongtien;
            $_SESSION['tongsoluong'] = $tongsoluong;
            echo          
            '
                  <tr>
                    <th colspan="2"></th>
                    <th class="text-right text-danger" style="font-size: 20px;">Tổng Cộng</th>
                    <td colspan="2" class="text-right text-danger font-weight-bold" style="font-size: 20px;">' . QuyDoiTienTe($tongtien) . '</td>
                  </tr>
                    </tbody>
                </table>
              <form method="POST" action="ghihoadon.php">
              <div class="row justify-content-center my-1">
                <button type="submit" name="ghihoadon" class="btn btn-primary bg-primary my-4" style="font-size: 25px;">
                    Xác nhận
                </button>
                </div>
                </div>
            </div>
            ';
        echo "</div>";
    }
    else
    {
        header('location:index.php');
    }
?>
