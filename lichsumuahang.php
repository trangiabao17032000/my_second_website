
<?php
  include("top.php");
?>


<?php
            require 'DataProvider.php';
            if(isset($_SESSION['username']))
            {
              $user = $_SESSION['username'];
              $sql = "SELECT * FROM taikhoan WHERE taikhoan = '$user'";
              $result = DataProvider::executeQuery($sql);
              if(mysqli_num_rows($result) > 0)
              {
                $row =mysqli_fetch_array($result);
                $makh = $row["makh"];
              }
              else
              {
                $makh="00000000";
              }
              $sql = "SELECT * FROM donhang WHERE makhachhang = '$makh'";
              $result = DataProvider::executeQuery($sql);
              echo '<hr>';
              echo '<h2 class="text-center text-dark"> === Lịch sử mua hàng === </h2>';
              if(mysqli_num_rows($result) > 0)
              {
                while($row =mysqli_fetch_array($result))
                {
                  echo '<div class="row justify-content-center">';
                  echo '<div class="container w-50 border border-secondary mx-3 my-3">';
                  echo '<div class="d-flex text-dark justify-content-between">';
                  echo '<a  href = "chitiethoadon.php?mahd='.$row['madonhang'].'"class="font-weight-bold">' .' Mã dơn hàng : ' . $row['madonhang'] . "</a>";
                  echo '<p class="">' .' Ngày đơn hàng : ' . $row['ngaydatdon'] . "</p>";
                  echo '<p class="text-danger">'  . $row['tinhtrang'] . "</p>";
                  echo "</div>";
                  echo '<p class="">' .' Địa chỉ giao : ' . $row['diachigiao'] . "</p>";
                  echo '<p class="">' .' Tổng số lượng sản phẩm : ' . $row['tongsoluongsp'] . "</p>";
                  echo '<p class="">' .' Tổng tiền : ' . $row['tongtien'] . "</p>";
                  echo "</div>";
                  echo "</div>";
                }
              }
              else
              {
                echo '<h2 class="text-center">Bạn không có lịch sử mua hàng<h2>';
              }
            }
            else
            {
              echo '<h2 class="text-center text-danger">Bạn chưa đăng nhập<h2>';
              echo '<h2 class="text-center text-danger">không có lịch sử mua hàng nào<h2>';
            }
?>
<?php
 include("foot.php");
?>