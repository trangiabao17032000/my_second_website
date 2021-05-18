<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">  
<?php
	if(isset($_GET['mahd']))
	{
		session_start();	
		require 'DataProvider.php';
		$user = $_SESSION['username'];
		$sql = "SELECT * FROM taikhoan WHERE taikhoan = '$user'";
        $result = DataProvider::executeQuery($sql);
        if(mysqli_num_rows($result) > 0)
        {
        		$row =mysqli_fetch_array($result);
                $hoten = $row["hoten"];
                $sdt = $row["dienthoai"];
                $makh = $row["makh"];
        }
		$madonhang = $_GET['mahd'];
        $sql = "SELECT * FROM donhang WHERE madonhang = '$madonhang' && makhachhang = '$makh'";
        $result = DataProvider::executeQuery($sql);
        if(mysqli_num_rows($result) > 0)
        {
        		$row =mysqli_fetch_array($result);
                $makh = $row["makhachhang"];
                $diachi = $row["diachigiao"];
                $phuongthucthanhtoan = $row["hinhthuc"];
                $ngaymua = $row["ngaydatdon"];
                $tongtien = $row["tongtien"];
        }
        else
        {
        	header('location:index.php');
        }
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
        $sql = "SELECT * FROM chitietdonhang WHERE madonhang = '$madonhang'";
        $result = DataProvider::executeQuery($sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row =mysqli_fetch_array($result))
            {
            	$masp = $row['masp'];
            	$sql1 = "SELECT * FROM sanpham WHERE masp = '$masp'";
        		$result1 = DataProvider::executeQuery($sql1);
        		if(mysqli_num_rows($result1) > 0)
	              {
	                $row1 =mysqli_fetch_array($result1);
	                $tensp = $row1["tensp"];
	                $dongia = $row1["giasp"];
	              }

                echo '
                    <tr>
                      <td scope="row"><div class="mt-4 ">' . $stt. '</div></td>
                      <td scope="row"><div class="mt-4 ">'. $tensp .'</div></td>
                      <td scope="row"><div class="mt-4 ">'. $row['soluong'] .'</div></td>

                      <td class="text-right"><div class="mt-4"><div class="mt-4">' . QuyDoiTienTe($dongia). '</div></td>

                      <td class="text-right"><div class="mt-4">' . QuyDoiTienTe($dongia * $row["soluong"]). '</div></td>
                    </tr>
                ';
                $stt++;
        	}
        echo "</div>";
    	}
    }
	else
	{
		header('location:index.php');
	}
?>