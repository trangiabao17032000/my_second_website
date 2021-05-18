<?php
    session_start();
        if(isset($_POST['ghihoadon']))
        {
            $diachi = $_SESSION['diachigiao'] ;
            $phuongthucthanhtoan = $_SESSION['phuongthucthanhtoan'];
            $ngaymua = $_SESSION['ngayhoadon'];
            $tongtien = $_SESSION['tongtien'];
            $tongsoluong = $_SESSION['tongsoluong'];
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
            $sql = "SELECT * FROM donhang";
            $result = DataProvider::executeQuery($sql);
            $mahd = mysqli_num_rows($result) + 1;
            $tinhtrang = "Đã xác nhận";
            if($mahd < 10)
            {
                $mahd = "DH000" . $mahd;
            }
            if($mahd >= 10 && $mahd <= 99)
            {
                $mahd = "DH00" . $mahd; 
            }

            $sql = "INSERT INTO donhang VALUES (";
            $sql = $sql . "'" . $mahd . "'";
            $sql = $sql . "," . "'" . $makh . "'";
            $sql = $sql . "," . "'" . $tongsoluong . "'";
            $sql = $sql . "," . "'" . $tongtien . "'";
            $sql = $sql . "," . "'" . $ngaymua . "'";
            $sql = $sql . "," . "'" . $phuongthucthanhtoan . "'";
            $sql = $sql . "," . "'" . $tinhtrang . "'";
            $sql = $sql . "," . "'" . $diachi . "'";
            $sql = $sql . ")";
            $result = DataProvider::executeQuery($sql);
            foreach ($_SESSION["cart"] as $key => $author)
            {
                $thanhtien = $author["giasp"] * $author["slsp"];
                $sql = "INSERT INTO chitietdonhang VALUES (";
                $sql = $sql . "'" . $mahd . "'";
                $sql = $sql . "," . "'" . $author["masp"] . "'";
                $sql = $sql . "," . "'" . $author["slsp"] . "'";
                $sql = $sql . "," . "'" . $author["giasp"] . "'";
                $sql = $sql . "," . "'" . $thanhtien . "'";
                $sql = $sql . ")";
                $result = DataProvider::executeQuery($sql);
                unset($_SESSION['cart']);
            }
?>
            <script type="text/javascript">
                alert("Giao dịch thành công");
                window.location="./index.php";
            </script>
<?php
        }
        else
        {
            header('location:index.php');
        }
?>