<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thanh toán</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <script type="text/javascript" src="./js/js.js"></script>
</head>
<?php
    include("top.php"); 
    if($user == null)
    {
?>
        <script type="text/javascript">
                window.location="./dangnhap.php";
        </script>
<?php
    }
    require 'DataProvider.php';
    $sql = "SELECT diachi  FROM taikhoan where taikhoan = '$user'";
    $result = DataProvider::executeQuery($sql);
    $row =mysqli_fetch_array($result);
?>

<div class="container">
    <form action="hoadon.php" method="POST">
        <h2 class="my-2 text-danger">Chọn địa chỉ giao hàng</h2>
        <div class="form-group">
            <div class="radio my-3">
                <input type="radio" id="diachidangky" name="ChonDiaChi" checked value="diachidangky" onchange="ChonDiaChiGiao()">  Chọn đia chỉ đã đăng ký
            </div>
            <div class="radio">
                <input type="radio" id="diachikhac" name="ChonDiaChi" value="diachikhac" onchange="ChonDiaChiGiao()"> Chọn địa chỉ khác
            </div>
            <div>
                <label>Địa chỉ giao hàng </label>
                <input type="text" id="diachi" name="diachi" class="my-3 mx-3" disabled value="<?php echo $row[0]; ?>">
                <input type="text" id="diachi2" name="diachi2" class="my-3 mx-3" hidden value="<?php echo $row[0]; ?>">
            </div>
        </div>

        <h2 class="text-danger">Chọn hình thức thanh toán</h2>
        <div class="radio my-3">
            <input type="radio" id="tttienmat" name="thanhtoan" checked value="tienmat" onchange="ChonDiaChiGiao()"> Thanh toán tiền mặt
        </div>
        <div class="radio my-3">
            <input type="radio" id="ttchuyenkhoan" name="thanhtoan" disabled value="chuyenkhoan" onchange="ChonDiaChiGiao()"> Thanh toán qua chuyển khoản ngân hàng (Đang phát triển)
        </div>
        <div class="radio my-3">
            <input type="radio" id="ttvidientu" name="thanhtoan" disabled value="vidientu" onchange="ChonDiaChiGiao()"> Thanh toán qua ví điện tử (Đang phát triển)
        </div>

        <div class="row justify-content-center">
            <input class="my-3 btn-primary btn-lg" type="submit" name="chondiachi" value="Thanh toán" onclick="return ChonDiaChi();">   
        </div>
    </form>
</div>

<?php
    include("foot.php");
?>